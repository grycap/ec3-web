<?php
require('OAuth2/Client.php');
require('OAuth2/GrantType/IGrantType.php');
require('OAuth2/GrantType/AuthorizationCode.php');

const CLIENT_ID     = 'unity-oauth-ec3';
const CLIENT_SECRET = 'k4VdL5PxtxC3z72';

const REDIRECT_URI           = 'https://servproject.i3m.upv.es/ec3-ltos/auth.php';
const AUTHORIZATION_ENDPOINT = 'https://unity.egi.eu/oauth2-as/oauth2-authz';
const TOKEN_ENDPOINT         = 'https://unity.egi.eu/oauth2/token';

$client = new OAuth2\Client(CLIENT_ID, CLIENT_SECRET, OAuth2\Client::AUTH_TYPE_AUTHORIZATION_BASIC);
if (!isset($_GET['code']))
{
    $auth_url = $client->getAuthenticationUrl(AUTHORIZATION_ENDPOINT, REDIRECT_URI, array('scope' => 'profile openid additional'));
    header('Location: ' . $auth_url);
    die('Redirect');
}
else
{
    $params = array('code' => $_GET['code'], 'redirect_uri' => REDIRECT_URI);
    $response = $client->getAccessToken(TOKEN_ENDPOINT, 'authorization_code', $params);
    $client->setAccessToken($response['result']['access_token']);
    $client->setAccessTokenType(OAuth2\Client::ACCESS_TOKEN_BEARER);
    $params = array('schema' => 'openid', 'access_token' => $response['result']['access_token']);
    $response = $client->fetch('https://unity.egi.eu/oauth2/userinfo', $params);

    if ($response['code'] == 200) {
        if ($response['result']['confirmedRegistration'] != 'true' || $response['result']['hasActiveSla'] != 'true') {
		header("HTTP/1.1 401 Unauthorized");
		echo "Non Authorized";
		die();
	}
        if ( !session_id() ) {
            session_start();
        }
        $_SESSION["unity_user_name"] = $response['result']['name'];
        #$_SESSION["unity_user_sub"] = $response['result']['sub'];
        $_SESSION["unity_user_sub"] = $response['result']['persistent'];
        $_SESSION["unity_code"] = $_GET['code'];

        header('Location: https://servproject.i3m.upv.es/ec3-ltos/index.php');
    } else {
	header("HTTP/1.1 401 Unauthorized");
        echo "Non Authorized";
        die();
    }
}
?>
