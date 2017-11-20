<?php

use PHPUnit\Framework\TestCase;

final class EC3PagesTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testEC3Destroy()
    {
        file_put_contents("/tmp/auth_clustername", "proxy = ; host = ");
        $this->expectOutputString('{}');
        $_POST = array("clustername"=>"cluster_clustername");
        $_SESSION = array("egi_user_sub"=>"egiusersub");
        $GLOBALS["EC3UnitTest"] = true;
        include('../../ec3-destroy-cluster.php');
        $data = file_get_contents("/tmp/auth_clustername");
        $this->assertContains("id = occi; type = OCCI; proxy = line1\\nline2\\nline3; host = \n", $data);
        unlink("/tmp/auth_clustername");
        $data = file_get_contents("/tmp/ec3_del_clustername");
        $this->assertContains("destroy --yes --force -a /tmp/auth_clustername cluster_clustername\n", $data);
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
        $_POST = array("clustername"=>"cluster_clustername");
        $_SESSION = array("egi_user_sub"=>"egiusersub");
        $GLOBALS["EC3UnitTest"] = true;
        include('../../ec3-destroy-cluster.php');
        $data = file_get_contents("/tmp/auth_clustername");
        $this->assertContains("id = occi; type = OCCI; proxy = line1\\nline2\\nline3; host = \n", $data);
        unlink("/tmp/auth_clustername");
        $data = file_get_contents("/tmp/ec3_del_clustername");
        $this->assertContains("destroy --yes --force -a /tmp/auth_clustername cluster_clustername\n", $data);
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
        file_put_contents("/tmp/auth_clustername", "proxy = ; host = ");
        $GLOBALS['templates_path'] = "/tmp";
        $this->expectOutputRegex('/{"ip":"10\.0\.0\.1\\n","name":"cluster_.{6}","username":"cloudadm","secretkey":"key%0A"}/');
        $_POST = array("cloud"=>"fedcloud", "endpoint-fedcloud"=>"serverfed", "nodes-fedcloud"=>"2",
                       "vmi-fedcloud"=>"fed1", "front-fedcloud"=>"fetype", "lrms-fedcloud"=>"torque",
                       "wn-fedcloud"=>"wntype", "nfs"=>"nfs", "maui"=>"maui");
        $_SESSION = array("egi_user_sub"=>"egiusersub", "egi_user_name"=>"egiusername");
        $GLOBALS["EC3UnitTest"] = true;
        include('../../ec3-server-process.php');
        $files = scandir('/tmp');
        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 7) === "system_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("disk.0.image.url = 'appdb://serverfed/fed1?vo.access.egi.eu'", $data);
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
                $this->assertContains("launch -y cluster_", $data);
                $this->assertContains("torque clues2 myproxy_ltos nfs maui system_", $data);
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
        $this->expectOutputString('<select name="front-fedcloud" id="front-fedcloud" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation"><option value=""></option><option value="large">4096 MB - 4 CPUs</option><option value="mem_medium">8192 MB - 2 CPUs</option></select>');
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
}
?>
