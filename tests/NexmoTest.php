<?php

use \SMS;

class NexmoTest extends PHPUnit_Framework_TestCase
{
    public function testDebugSend()
    {
        $Nexmo = new \SMS\Nexmo();
        $asserted = [
            'message-count' => '1',
            'messages' => [
                [
                    'to' => 'sender number here',
                    'message-id' => 'message id here',
                    'status' => '999',
                    'status-explanation' => 'Debugging',
                    'remaining-balance' => 'remaining balance here',
                    'message-price' => 'message price here',
                    'network' => 'network here',
                ]
            ]
        ];
        $Nexmo->debugSend();
        $response = $Nexmo->getResponse();
        $this->assertEquals($asserted, $response);
    }
}