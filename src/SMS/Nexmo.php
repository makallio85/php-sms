<?php

namespace SMS;

require_once 'config/Config.php';

/**
 * Nexmo gateway class.
 */
class Nexmo extends BaseGateway implements GatewayInterface
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $configData = \SMS\Config::get('Nexmo');
        $this->setConfig($configData);
        parent::__construct();
    }

    /**
     * Method to check, if service is online.
     *
     * @return bool
     */
    public function isOnline()
    {
        $data = file_get_contents('https://rest.nexmo.com/sms/json?');
        $data = json_decode($data, true);

        return !empty($data['message-count']);
    }

    /**
     * Validate sender, receiver and message.
     *
     * @param \SMS\SMS $SMS
     */
    public function validate(\SMS\SMS $SMS)
    {
        $maxSize = $this->getConfig('maxMessageSize');
        $msgSize = strlen($SMS->getMessage());
        if ($msgSize > $maxSize) {
            $this->Response->Validator->setError([
                'message' => "Message size - $msgSize chars - exceeds the limit of $maxSize characters!",
            ]);
        }

        $sender = $SMS->getSender();
        if (!$this->Response->Validator->validatePhone($sender)) {
            $this->Response->Validator->setError([
                'message' => "Sender phone number '$sender' is not valid!",
            ]);
        }

        $receiver = $SMS->getReceiver();
        if (!$this->Response->Validator->validatePhone($receiver)) {
            $this->Response->Validator->setError([
                'message' => "Receiver phone number '$receiver' is not valid!",
            ]);
        }
    }

    /**
     * Build request string.
     *
     * @param \SMS\SMS $SMS
     *
     * @return string
     */
    public function buildRequest(\SMS\SMS $SMS)
    {
        $request = $this->getConfig('url');
        $request .= 'api_key='.$this->getConfig('key');
        $request .= '&api_secret='.$this->getConfig('secret');
        $request .= '&from='.$SMS->getSender();
        $request .= '&to='.$SMS->getReceiver();
        $request .= '&text='.urlencode($SMS->getMessage());

        return $request;
    }

    /**
     * Send sms.
     *
     * @param \SMS\SMS $SMS
     *
     * @return bool
     */
    public function send(\SMS\SMS $SMS)
    {
        if (count($this->Response->Validator->getErrors()) > 0) {
            return false;
        }
        if ($this->getConfig('debug')) {
            $this->Response->setData([
                'message-count' => '1',
                'messages' => [
                    [
                        'to' => 'sender number here',
                        'message-id' => 'message id here',
                        'status' => '999',
                        'status-explanation' => $this->config['statusCodes'][999],
                        'remaining-balance' => 'remaining balance here',
                        'message-price' => 'message price here',
                        'network' => 'network here',
                    ],
                ],
            ]);
        } else {
            $request = $this->buildRequest($SMS);
            $data = json_decode(file_get_contents($request), true);
            $this->Response->setData($data);
        }

        return true;
    }
}
