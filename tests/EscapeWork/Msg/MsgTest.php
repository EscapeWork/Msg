<?php 
namespace EscapeWork\Msg;

use EscapeWork\Msg\Msg;

class MsgTest extends \PHPUnit_Framework_TestCase
{
    public function assettPreConditions()
    {
        $this->assertTrue(class_exists('EscapeWork\Msg\Msg'));
    }

    public function setUp()
    {
        Msg::clearAll();
    }

    public function testSetAndGetMessageShouldWork()
    {
        Msg::setMessage('Message');

        $this->assertEquals('Message', Msg::getMessages(false));
    }

    public function testSetAndGetErrorShouldWork()
    {
        Msg::setError('Error');

        $this->assertEquals('Error', Msg::getErrors( false ) );
    }

    public function testSetAndGetInfoShouldWork()
    {
        Msg::setInfo('Info');

        $this->assertEquals('Info', Msg::getInfos( false ) );
    }

    public function testSetAndGetWarningShouldWork()
    {
        Msg::setWarning('Warning');

        $this->assertEquals('Warning', Msg::getWarnings( false ) );
    }

    public function testGetMessageFromSessionShouldWork()
    {
        $session = ['message' => 'Message'];
        Msg::setSessionHandler(new SessionHandler($session));

        $this->assertEquals('Message', Msg::getAll(false));
    }

    public function testGetErrorFromSessionShouldWork()
    {
        $session = ['error' => 'Error'];
        Msg::setSessionHandler(new SessionHandler($session));

        $this->assertEquals('Error', Msg::getAll(false));
    }

    public function testGetInfoFromSessionShouldWork()
    {
        $session = ['info' => 'Info'];
        Msg::setSessionHandler(new SessionHandler($session));

        $this->assertEquals('Info', Msg::getAll(false));
    }

    public function testGetWarningFromSessionShouldWork()
    {
        $session = ['warning' => 'Warning'];
        Msg::setSessionHandler(new SessionHandler($session));

        $this->assertEquals('Warning', Msg::getAll(false));
    }

    public function testGetMessagesFromSessionShouldWork()
    {
        $session = ['messages' => ['Message 1', 'Message 2']];
        Msg::setSessionHandler(new SessionHandler($session));

        $this->assertEquals('Message 1<br />Message 2', Msg::getAll(false));
    }

    public function testGetErrorsFromSessionShouldWork()
    {
        $session = ['errors' => ['Error 1', 'Error 2']];
        Msg::setSessionHandler(new SessionHandler($session));

        $this->assertEquals('Error 1<br />Error 2', Msg::getAll(false));
    }

    public function testGetWarningsFromSessionShouldWork()
    {
        $session = ['warnings' => ['Warning 1', 'Warning 2']];
        Msg::setSessionHandler(new SessionHandler($session));

        $this->assertEquals('Warning 1<br />Warning 2', Msg::getAll(false));
    }

    public function testGetInfosFromSessionShouldWork()
    {
        $session = ['infos' => ['Info 1', 'Info 2']];
        Msg::setSessionHandler(new SessionHandler($session));

        $this->assertEquals('Info 1<br />Info 2', Msg::getAll( false ) );
    }

    public function testGetAllTypesFromSessionWhouldWork()
    {
        $session = [
            'message' => 'Message', 
            'info'    => 'Info', 
            'warning' => 'Warning', 
            'error'   => 'Error', 
        ];
        Msg::setSessionHandler(new SessionHandler($session));

        $this->assertEquals('MessageInfoWarningError', Msg::getAll(false));
    }
   
    public function tearDown()
    {
        Msg::clearAll();
    }
}