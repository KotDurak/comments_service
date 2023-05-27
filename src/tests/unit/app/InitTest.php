<?php


namespace tests\unit\app;


class InitTest extends \Codeception\Test\Unit
{
    public function testTrue()
    {
        $a = true;
        $this->assertNotNull($a);
        verify($a)->true();
    }
}