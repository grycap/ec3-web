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
        $_POST = array("clustername"=>"cluster_clustername", "proxy"=>"line1\r\nline2\r\nline3");
        include('../../ec3-destroy-cluster.php');

        $data = file_get_contents("/tmp/auth_clustername");
        $this->assertContains("id = occi; type = OCCI; proxy = line1\\nline2\\nline3; host = \n", $data);
        unlink("/tmp/auth_clustername");

        $data = file_get_contents("/tmp/ec3_del_clustername");
        $this->assertContains("destroy --yes -a /tmp/auth_clustername cluster_clustername\n", $data);
        unlink("/tmp/ec3_del_clustername");
    }

    /**
    * @runInSeparateProcess
    */
    public function testEC3ServerEC2()
    {
        $GLOBALS['templates_path'] = "/tmp";
        $this->expectOutputRegex('/{"ip":"10\.0\.0\.1\\n","name":"cluster_.{6}","username":"user","secretkey":"key%0A"}/');
        $_POST = array("cloud"=>"ec2", "accesskey"=>"ak", "secretkey"=>"sk", "ami"=>"ami-12345678",
                       "region"=>"us-east-1", "ami-user"=>"user", "instance-type-front"=>"m1.small",
                       "instance-type-wn"=>"m1.small", "lrms-ec2"=>"torque", "nfs"=>"nfs", "maui"=>"maui",
                       "nodes-ec2"=>"2");
        include('../../ec3-server-process.php');

        $files = scandir('/tmp');

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 5) === "auth_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("type = EC2; username = ak; password = sk; id = ec2", $data);
                unlink('/tmp/' . $file);
            }
        }
        $this->assertTrue($found);

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 7) === "system_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("disk.0.image.url = 'aws://us-east-1/ami-12345678", $data);
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
                $this->assertContains("torque clues2 nfs maui system_", $data);
                $this->assertContains("-a /tmp/auth_", $data);
                unlink('/tmp/' . $file);
            }
        }
        $this->assertTrue($found);
    }

    /**
    * @runInSeparateProcess
    */
    public function testEC3ServerONE()
    {
        $GLOBALS['templates_path'] = "/tmp";
        $this->expectOutputRegex('/{"ip":"10\.0\.0\.1\\n","name":"cluster_.{6}","username":"user","password":".*"}/');
        $_POST = array("cloud"=>"one", "username"=>"ak", "pass"=>"sk", "endpoint"=>"server:2633",
                       "vmi"=>"1", "vmi-user"=>"user", "vmi-pass"=>"pass", "front-cpu"=>"1", "lrms-one"=>"torque",
                       "front-mem"=>"1", "wn-cpu"=>"1", "wn-mem"=>"2", "nfs"=>"nfs", "maui"=>"maui",
                       "nodes-one"=>"2");
        include('../../ec3-server-process.php');

        $files = scandir('/tmp');

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 5) === "auth_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("type = OpenNebula; host = server:2633; username = ak; password = sk; id = one", $data);
                unlink('/tmp/' . $file);
            }
        }
        $this->assertTrue($found);

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 7) === "system_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("disk.0.image.url = 'one://server/1'", $data);
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
                $this->assertContains("torque clues2 nfs maui system_", $data);
                $this->assertContains("-a /tmp/auth_", $data);
                unlink('/tmp/' . $file);
            }
        }
        $this->assertTrue($found);
    }

    /**
    * @runInSeparateProcess
    */
    public function testEC3ServerOST()
    {
        $GLOBALS['templates_path'] = "/tmp";
        $this->expectOutputRegex('/{"ip":"10\.0\.0\.1\\n","name":"cluster_.{6}","username":"user","secretkey":"key%0A"}/');
        $_POST = array("cloud"=>"openstack", "username-openstack"=>"ak", "pass-openstack"=>"sk", "endpoint-openstack"=>"serverost",
                       "vmi-openstack"=>"ost1", "vmi-user-openstack"=>"user", "front-cpu-openstack"=>"1", "lrms-openstack"=>"torque",
                       "front-mem-openstack"=>"1", "wn-cpu-openstack"=>"1", "wn-mem-openstack"=>"2", "nfs"=>"nfs", "maui"=>"maui",
                       "nodes-openstack"=>"2", "tenant-openstack"=>"tenant");
        include('../../ec3-server-process.php');

        $files = scandir('/tmp');

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 5) === "auth_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("id = ost; type = OpenStack; host = serverost; username = ak; password = sk; tenant = tenant", $data);
                unlink('/tmp/' . $file);
            }
        }
        $this->assertTrue($found);

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 7) === "system_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("disk.0.image.url = 'ost://serverost/ost1'", $data);
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
                $this->assertContains("torque clues2 nfs maui system_", $data);
                $this->assertContains("-a /tmp/auth_", $data);
                unlink('/tmp/' . $file);
            }
        }
        $this->assertTrue($found);
    }

    /**
    * @runInSeparateProcess
    */
    public function testEC3ServerFC()
    {
        $GLOBALS['templates_path'] = "/tmp";
        $this->expectOutputRegex('/{"ip":"10\.0\.0\.1\\n","name":"cluster_.{6}","username":"cloudadm","secretkey":"key%0A"}/');
        $_POST = array("cloud"=>"fedcloud", "vo-fedcloud"=>"vo", "proxy"=>"proxy", "endpoint-fedcloud"=>"serverfed",
                       "vmi-fedcloud"=>"fed1", "front-fedcloud"=>"fetype", "lrms-fedcloud"=>"torque",
                       "wn-fedcloud"=>"wntype", "nfs"=>"nfs", "maui"=>"maui", "endpointName"=>"endpointName",
                       "nodes-fedcloud"=>"2");
        include('../../ec3-server-process.php');

        $files = scandir('/tmp');

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 5) === "auth_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("id = occi; type = OCCI; proxy = proxy; host = serverfed", $data);
                unlink('/tmp/' . $file);
            }
        }
        $this->assertTrue($found);

        $found = False;
        foreach ($files as $file) {
            if (substr($file, 0, 7) === "system_") {
                $found = True;
                $data = file_get_contents('/tmp/' . $file);
                $this->assertContains("disk.0.image.url = 'appdb://endpointName/fed1?vo'", $data);
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
                $this->assertContains("torque clues2 nfs maui system_", $data);
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
        $this->expectOutputString('<option value="https://occi-api.100percentit.com:8787/occi1.1">100IT</option><option value="https://fc-one.i3m.upv.es:11443">UPV-GRyCAP</option>');
        $_POST = array("vofedcloud"=>"fedcloud.egi.eu");
        include('../../print_select_endpoints.php');
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3PrintInstances()
    {
        $this->expectOutputString('<select name="front-fedcloud" id="front-fedcloud" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation"><option value=""></option><option value="large">4096 MB - 4 CPUs</option><option value="mem_medium">8192 MB - 2 CPUs</option></select>');
        $_POST = array("vofedcloud"=>"fedcloud.egi.eu", "endpointfedcloud"=>"UPV-GRyCAP");
        include('../../print_select_instances.php');
    }

    /**
     * @runInSeparateProcess
     */
    public function testEC3PrintOS()
    {
        $this->expectOutputString('<select name="vmi-fedcloud" id="vmi-fedcloud" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation"><option value=""></option><option value="egi.centos.6">EGI Centos 6</option><option value="egi.centos.7">EGI CentOS 7</option></select>');
        $_POST = array("vofedcloud"=>"fedcloud.egi.eu", "endpointfedcloud"=>"UPV-GRyCAP");
        include('../../print_select_os.php');
    }
}
?>
