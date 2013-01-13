<?php 
namespace EscapeWork\Msg;

use EscapeWork\Msg\Msg;

class MsgTest extends \PHPUnit_Framework_TestCase
{
    public function assettPreConditions()
    {
        $this->assertTrue( class_exists('EscapeWork\Msg\Msg') );
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
        #$_SESSION['message'] = 'Message';

        $this->assertEquals('Message', Msg::getAll( false ) );
    }
}