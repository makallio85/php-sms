<?php

namespace SMS;

/**
 * SMS class.
 *
 * Main class to use, when sending messages
 */
class SMS
{
    /**
     * Sender phone number.
     *
     * @var string
     */
    protected $sender = '';

    /**
     * Receiver phone number.
     *
     * @var string
     */
    protected $receiver = '';

    /**
     * Message contents.
     *
     * @var string
     */
    protected $message = '';

    /**
     * Currently used Gateway object.
     *
     * @var object
     */
    protected $Gateway;

    /**
     * Class constructor.
     *
     * @param string $gateway Desired gateway to use
     */
    public function __construct($gateway)
    {
        $this->setGateway($gateway);
    }

    /**
     * Set gateway to use.
     *
     * @param string $gateway Gateway name
     *
     * @throws Exception
     *
     * @return object SMS
     */
    public function setGateway($gateway)
    {
        switch ($gateway) {
            case 'Nexmo':
                $this->Gateway = new \SMS\Nexmo();
                break;
            default:
                throw new \Exception("Gateway $gateway does not exist!");
                break;
        }

        return $this;
    }

    /**
     * Set sender.
     *
     * @param string $sender Sender phone number
     *
     * @return object SMS
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Set message.
     *
     * @param string $message Message to send
     *
     * @return object SMS
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Set receiver.
     *
     * @param string $receiver Receiver phone number
     *
     * @return object SMS
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get sender.
     *
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Get Message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get receiver.
     *
     * @return string
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Get response.
     *
     * @return array Response data
     */
    public function getResponse()
    {
        return $this->Gateway->Response->getData();
    }

    /**
     * Get errors.
     *
     * @return array Errors
     */
    public function getErrors()
    {
        return $this->Gateway->Response->Validator->getErrors();
    }

    /**
     * Perform actual sending.
     *
     * @return bool
     */
    public function send()
    {
        $this->Gateway->validate($this);

        return $this->Gateway->send($this);
    }
}
