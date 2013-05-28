<?php namespace EscapeWork\Msg;

use PHPUnit_Framework_TestCase;

class SessionHandlerTest extends PHPUnit_Framework_TestCase
{

    public function testHasFunctionWorksAsExpected()
    {
        $sessionHandler = new SessionHandler([
            'foo' => 1, 
            'bar' => 2, 
        ]);

        $this->assertTrue($sessionHandler->has('foo'));
        $this->assertTrue($sessionHandler->has('bar'));
        $this->assertFalse($sessionHandler->has('foobar'));
        $this->assertFalse($sessionHandler->has('far'));
    }

    public function testGetFunctionWorksAsExpected()
    {
        $sessionHandler = new SessionHandler([
            'foo' => 1, 
            'bar' => 2, 
        ]);

        $this->assertEquals($sessionHandler->get('foo'), 1);
        $this->assertEquals($sessionHandler->get('bar'), 2);
        $this->assertNull($sessionHandler->get('foobar'));

    }
}