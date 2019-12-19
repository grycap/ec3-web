<?php

require_once('../../OAuth2/Client.php');

use PHPUnit\Framework\TestCase;

final class EC3PagesTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testEC3Destroy()
    {
        file_put_contents("/tmp/auth_clustername__egiusersub", "token = ; host = ");
        $this->expectOutputString('{}');
        $_POST = array("clustername"=>"cluster_clustername", "provider"=>"EGI FedCloud");
        $_SESSION = array("egi_user_sub"=>"egiusersub");
        $_SESSION = array("egi_access_token"=>"egiaccesstoken");
        $GLOBALS["EC3UnitTest"] = true;
        include('../../ec3-destroy-cluster.php');
        $data = file_get_contents("/tmp/auth_clustername__egiusersub");
        $this->assertContains("id = egi; type = OpenStack; token = line1\\nline2\\nline3; host = \n", $data);
        unlink("/tmp/auth_clustername__egiusersub");
        $data = file_get_contents("/tmp/ec3_del_clustername");
        $this->assertContains("destroy --yes --force -a /tmp/auth_clustername__egiusersub cluster_clustername\n", $data);
        unlink("/tmp/ec3_del_clustername");
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3DestroyNoAuth()
    {
        $this->expectOutputString('{}');
        if (!file_exists('/var/www/.ec3/clusters')) {
            mkdir("/var/www/.ec3/clusters", 777, true);
        }
        $data = file_put_contents("/var/www/.ec3/clusters/cluster_clustername", 'auth = \'[{"username": "d3jihha7", "password": "vkc4lbds80", "type": "InfrastructureManager"}, {"proxy": "proxy", "host": "host", "type": "OCCI"}]\'');
        $_POST = array("clustername"=>"cluster_clustername", "provider"=>"EGI FedCloud");
        $_SESSION = array("egi_user_sub"=>"egiusersub");
        $GLOBALS["EC3UnitTest"] = true;
        include('../../ec3-destroy-cluster.php');
        $data = file_get_contents("/tmp/auth_clustername__egiusersub");
        $this->assertContains("id = occi; type = OCCI; proxy = line1\\nline2\\nline3; host = \n", $data);
        unlink("/tmp/auth_clustername__egiusersub");
        $data = file_get_contents("/tmp/ec3_del_clustername");
        $this->assertContains("destroy --yes --force -a /tmp/auth_clustername__egiusersub cluster_clustername\n", $data);
        unlink("/tmp/ec3_del_clustername");
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3List()
    {
        $this->expectOutputRegex('/LIST\n[\\n]*/');
        $_SESSION = array("egi_user_sub"=>"egiusersub", "egi_user_name"=>"egiusername");
        $GLOBALS["EC3UnitTest"] = true;
        include('../../ec3-list-clusters.php');
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3SSHKey()
    {
        $this->expectOutputRegex('/key\n[\\n]*/');
        $_GET = array("clustername"=>"cluster_clustername");
        $_SESSION = array("egi_user_sub"=>"egiusersub", "egi_user_name"=>"egiusername");
        $GLOBALS["EC3UnitTest"] = true;
        include('../../ec3-ssh-key.php');
        $this->assertContains('Content-Disposition: attachment; filename="key.pem"',xdebug_get_headers());
    }

    /**
    * @runInSeparateProcess 
    */
    public function testEC3ServerFC()
    {
        $GLOBALS['templates_path'] = "/tmp";
        $this->expectOutputRegex('/{"ip":"10\.0\.0\.1\\n","name":"clustername","username":"cloudadm","secretkey":"key%0A"}/');
        $_POST = array("cloud"=>"fedcloud", "endpoint-fedcloud"=>"https://serverfed", "nodes-fedcloud"=>"2",
                       "vmi-fedcloud"=>"fed1", "front-fedcloud"=>"1;1024", "lrms-fedcloud"=>"torque",
                       "wn-fedcloud"=>"1;1024", "nfs"=>"nfs", "maui"=>"maui", "endpointName"=>"endpointName",
                       "cluster-name"=>"clustername");
        $_SESSION = array("egi_user_sub"=>"egiusersub", "egi_user_name"=>"egiusername", "egi_access_token"=>"token");
        $GLOBALS["EC3UnitTest"] = true;
        include('../../ec3-server-process.php');
        $files = scandir('/tmp');

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 5) === "auth_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("id = egi; type = OpenStack; host = https://serverfed; username = egi.eu; auth_version = 3.x_oidc_access_token; password = token; tenant = openid", $data);
                unlink('/tmp/' . $file);
            }
        }
        $this->assertTrue($found);

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 7) === "system_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("disk.0.image.url = 'appdb://endpointName/fed1?vo.access.egi.eu'", $data);
                $this->assertContains("ec3_max_instances = 2", $data);
                unlink('/tmp/' . $file);
            }
        }
        $this->assertTrue($found);

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 8) === "ec3_log_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("launch -y clustername__egiusersub torque clues2 refreshtoken nfs system_", $data);
                $this->assertContains("-a /tmp/auth_", $data);
                unlink('/tmp/' . $file);
            }
        }
        $this->assertTrue($found);
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3PrintEndpoints()
    {
        $this->expectOutputString('<option value="https://fedcloud-services.egi.cesga.es:11443">CESGA</option><option value="http://cloud.recas.ba.infn.it:8787/occi">RECAS-BARI</option>');
        include('../../print_select_endpoints.php');
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3PrintInstances()
    {
        $this->expectOutputString('<select name="front-fedcloud" id="front-fedcloud" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation"><option value=""></option><option value="1;1024">1 CPUs - 1024 RAM</option><option value="2;8192">2 CPUs - 8192 RAM</option><option value="4;4096">4 CPUs - 4096 RAM</option><option value="10;10240">10 CPUs - 10240 RAM</option></select>');
        $_POST = array("endpointfedcloud"=>"CESGA");
        include('../../print_select_instances.php');
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3PrintOS()
    {
        $this->expectOutputString('<select name="vmi-fedcloud" id="vmi-fedcloud" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation"><option value=""></option><option value="egi.centos.6">EGI Centos 6</option><option value="egi.centos.7">EGI CentOS 7</option></select>');
        $_POST = array("endpointfedcloud"=>"CESGA");
        include('../../print_select_os.php');
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3LogOut()
    {
        $this->expectOutputString('');
        $_SESSION = array("egi_user_sub"=>"egiusersub", "egi_user_name"=>"egiusername");
        include('../../logout.php');
        $this->assertFalse(isset($_SESSION['egi_user_sub']));
        $this->assertContains('Location: https://marketplace.egi.eu/42-applications-on-demand',xdebug_get_headers()); 
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3Auth()
    {
        $this->expectOutputString('');

        $mock_client = $this->getMockBuilder(OAuth2\Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['getAuthenticationUrl'])
            ->getMock();
        $mock_client->method('getAuthenticationUrl')
            ->willReturn("AuthURL");

        $GLOBALS["EC3UnitTestOAuth2Client"] = $mock_client;
        include('../../auth_egi.php');
        $this->assertEquals(array('Location: AuthURL'),xdebug_get_headers());
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3AuthCode()
    {
        $this->expectOutputString('');

        $mock_client = $this->getMockBuilder(OAuth2\Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['getAccessToken', 'setAccessToken', 'fetch'])
            ->getMock();
        $response = array("code"=>200, "result"=>array("access_token"=>"AcccessToken"));
        $mock_client->method('getAccessToken')
            ->willReturn($response);
        $mock_client->method('setAccessToken')
            ->willReturn("");
        $response = array("code"=>200, "result"=>array("name"=>"eginame", "sub"=>"egisub", "eduperson_entitlement"=>array("urn:mace:egi.eu:aai.egi.eu:member@vo.access.egi.eu")));
        $mock_client->method('fetch')
            ->willReturn($response);

        $params = array('schema' => 'openid', 'access_token' => 'AcccessToken');
        $mock_client->expects($this->once())
            ->method('fetch')
            ->with(
                $this->equalTo('https://aai.egi.eu/oidc/userinfo'),
                $params
            );

        $_GET['code'] = "code";
        $GLOBALS["EC3UnitTestOAuth2Client"] = $mock_client;
        include('../../auth_egi.php');
        $this->assertEquals("eginame", $_SESSION['egi_user_name']);
        $this->assertEquals("egisub", $_SESSION['egi_user_sub']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3CtxtLog()
    {
        $this->expectOutputString('CTXT_LOG');
        $_SESSION = array("egi_user_sub"=>"egiusersub", "egi_user_name"=>"egiusername");
        $_GET['cluster'] = "clustername";
        $GLOBALS["EC3UnitTest"] = true;
        include('../../ec3-log-clusters.php');
    }
}
?>
