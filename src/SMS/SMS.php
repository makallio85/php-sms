<?php

namespace SMS;

/**
 * Class SMS
 *
 * Main class to use, when sending messages
 *
 * @package SMS
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
     * @var BaseGateway $Gateway
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
     * @throws \Exception
     *
     * @return $this
     */
    public function setGateway($gateway)
    {
        switch ($gateway) {
            case 'Nexmo':
                $this->Gateway = new Nexmo();
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
     * @return $this
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
     * @return $this
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
     * @return $this
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
     * @noinspection
     */
    public function send()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $this->Gateway->validate($this);

        /** @noinspection PhpUndefinedMethodInspection */

        return $this->Gateway->send($this);
    }
}
