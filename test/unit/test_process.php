<?php

use PHPUnit\Framework\TestCase;

include_once('../../process.php');

final class ProcessTest extends TestCase
{
    public function testProcess()
    {
        $process = new Process("sleep 1");
        $process->start();
        $process->getPid();
        $this->assertTrue($process->status());
        sleep(2);
        $this->assertFalse($process->status());
        $data = $process->getOutput();
        $this->assertEquals("", $data);

        $process = new Process("ls .");
        $process->start();
        sleep(1);
        $data = $process->getOutput();
        $this->assertContains("test_process.php", $data);

        $process = new Process("sleep 30");
        $process->start();

        $this->assertTrue($process->stop());
        sleep(1);
        $this->assertFalse($process->status());
    }
    
}
?>
