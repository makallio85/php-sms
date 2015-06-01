<?php

use \SMS;

/** 
 * Test class for Nexmo gateway class
 */
class NexmoTest extends PHPUnit_Framework_TestCase
{
    /**
     * Send send method
     */
    public function testSend()
    {
        $SMS = new \SMS\SMS('Nexmo');
        $SMS->setSender('Insert sender number or id here.')
            ->setReceiver('Insert receiver number here.')
            ->setMessage('Insert your test message here.')
            ->send();
        $response = $SMS->getResponse();
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
        $this->assertEquals($response, $asserted);
    }

    /**
     * Test validation
     */
    public function testValidation()
    {
        $Nexmo = new \SMS\Nexmo();
        $SMS = new \SMS\SMS('Nexmo');
        $SMS->setMessage('FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF ');
        $Nexmo->validate($SMS);
        $errors = $Nexmo->Response->Validator->getErrors();
        $this->assertTrue(count($errors) == 0);

        $Nexmo = new \SMS\Nexmo();
        $SMS = new \SMS\SMS('Nexmo');
        $SMS->setMessage('FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF F');
        $Nexmo->validate($SMS);
        $errors = $Nexmo->Response->Validator->getErrors();
        $this->assertTrue(count($errors) > 0);
    }

    /**
     * Test request building
     */
    public function testBuildRequest()
    {
        $Nexmo = new \SMS\Nexmo();
        $SMS = new \SMS\SMS('Nexmo');
        $request = $Nexmo->buildRequest($SMS);
        
        $arr = explode('?', $request);
        $this->assertTrue(count($arr) == 2);
        $this->assertEquals($arr[0], 'https://rest.nexmo.com/sms/json');
        
        $arr = explode('&', $arr[1]);
        $this->assertEquals($arr[0], 'api_key=Your api key here');
        $this->assertEquals($arr[1], 'api_secret=Your api secret here');
        $this->assertEquals($arr[2], 'from=');
        $this->assertEquals($arr[3], 'to=');
        $this->assertEquals($arr[4], 'text=');
    }
}