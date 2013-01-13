<?php 
namespace EscapeWork\Msg;

use EscapeWork\Msg\Msg;

class MsgTest extends \PHPUnit_Framework_TestCase
{
    public function assettPreConditions()
    {
        $this->assertTrue( class_exists('EscapeWork\Msg\Msg') );
    }

    public function setUp()
    {
        Msg::clearAll();
    }

    public function testSetAndGetMessageShouldWork()
    {
        Msg::setMessage('Message');

        $this->assertEquals('Message', Msg::getMessages( false ) );
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
        $_SESSION['message'] = 'Message';

        $this->assertEquals('Message', Msg::getAll( false ) );
    }

    public function testGetErrorFromSessionShouldWork()
    {
        $_SESSION['error'] = 'Error';

        $this->assertEquals('Error', Msg::getAll( false ) );
    }

    public function testGetInfoFromSessionShouldWork()
    {
        $_SESSION['info'] = 'Info';

        $this->assertEquals('Info', Msg::getAll( false ) );
    }

    public function testGetWarningFromSessionShouldWork()
    {
        $_SESSION['warning'] = 'Warning';

        $this->assertEquals('Warning', Msg::getAll( false ) );
    }

    public function testGetMessagesFromSessionShouldWork()
    {
        $_SESSION['messages'] = array('Message 1', 'Message 2');

        $this->assertEquals('Message 1<br />Message 2', Msg::getAll( false ) );
    }

    public function testGetErrorsFromSessionShouldWork()
    {
        $_SESSION['errors'] = array('Error 1', 'Error 2');

        $this->assertEquals('Error 1<br />Error 2', Msg::getAll( false ) );
    }

    public function testGetWarningsFromSessionShouldWork()
    {
        $_SESSION['warnings'] = array('Warning 1', 'Warning 2');

        $this->assertEquals('Warning 1<br />Warning 2', Msg::getAll( false ) );
    }

    public function testGetInfosFromSessionShouldWork()
    {
        $_SESSION['infos'] = array('Info 1', 'Info 2');

        $this->assertEquals('Info 1<br />Info 2', Msg::getAll( false ) );
    }

    public function testGetAllTypesFromSessionWhouldWork()
    {
        $_SESSION['message'] = 'Message';
        $_SESSION['info']    = 'Info';
        $_SESSION['warning'] = 'Warning';
        $_SESSION['error']   = 'Error';

        $this->assertEquals('MessageInfoWarningError', Msg::getAll( false ) );
    }

    public function tearDown()
    {
        Msg::clearAll();
    }
}