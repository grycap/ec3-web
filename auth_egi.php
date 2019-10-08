<?php
require_once('OAuth2/Client.php');
require_once('OAuth2/GrantType/IGrantType.php');
require_once('OAuth2/GrantType/AuthorizationCode.php');

const CLIENT_ID     = 'ec3ltos';
const CLIENT_SECRET = 'ALcZo53x26AarJRTvcJh8n2z5-vOA9I87OxbDFQDWgs7Y27aMztpgKbJi-kzBH3xCi30BigE_e_HJ_pVBEwl9rI';

const REDIRECT_URI           = 'https://servproject.i3m.upv.es/ec3-ltos/auth_egi.php';
const AUTHORIZATION_ENDPOINT = 'https://aai.egi.eu/oidc/authorize';
const TOKEN_ENDPOINT         = 'https://aai.egi.eu/oidc/token';
const USER_INFO_ENDPOINT     = 'https://aai.egi.eu/oidc/userinfo';

if (isset($GLOBALS["EC3UnitTestOAuth2Client"])) {
    // for mock in unit tests
    $client = $GLOBALS["EC3UnitTestOAuth2Client"];
} else {
    $client = new OAuth2\Client(CLIENT_ID, CLIENT_SECRET, OAuth2\Client::AUTH_TYPE_AUTHORIZATION_BASIC);
}

if (isset($_GET['error']))
{
	header("HTTP/1.1 401 Unauthorized");
        echo $_GET['error'] . ": " . $_GET['error_description'];
}
elseif (!isset($_GET['code']))
{
    $auth_url = $client->getAuthenticationUrl(AUTHORIZATION_ENDPOINT, REDIRECT_URI, array('scope' => 'profile openid email offline_access'));
    header('Location: ' . $auth_url);
}
else
{
    if ( !session_id() ) {
        session_start();
    }

    $params = array('code' => $_GET['code'], 'redirect_uri' => REDIRECT_URI);
    $response = $client->getAccessToken(TOKEN_ENDPOINT, 'authorization_code', $params);
    $_SESSION["egi_access_token"] = $response['result']['access_token'];
    $client->setAccessToken($response['result']['access_token']);
    $client->setAccessTokenType(OAuth2\Client::ACCESS_TOKEN_BEARER);
    $params = array('schema' => 'openid', 'access_token' => $response['result']['access_token']);
    $response = $client->fetch(USER_INFO_ENDPOINT, $params);

    if ($response['code'] == 200) {
        $is_access_vo_member = false;
        foreach ($response['result']['edu_person_entitlements'] as $value) {
		    if ($value == "urn:mace:egi.eu:aai.egi.eu:member@vo.access.egi.eu" || $value == "urn:mace:egi.eu:aai.egi.eu:vm_operator@vo.access.egi.eu") {
			    $is_access_vo_member = true;
		    }
        }
        if (!$is_access_vo_member) {
		header("HTTP/1.1 401 Unauthorized");
		echo "Non Authorized";
	}
        $_SESSION["egi_user_name"] = $response['result']['name'];
        $_SESSION["egi_user_sub"] = $response['result']['sub'];
        $_SESSION["egi_code"] = $_GET['code'];

        header('Location: https://servproject.i3m.upv.es/ec3-ltos/index.php');
    } else {
        header("HTTP/1.1 401 Unauthorized");
        echo "Non Authorized";
    }
}
?>
