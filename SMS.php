<?php

namespace SMS;

class SMS 
{
    protected $sender;
    protected $receiver;
    protected $message;
    protected $Gateway;
    protected $debug = true;

    public function __construct($gateway)
    {
        $this->setGateway($gateway);
    }

    public function setGateway($gateway)
    {
        switch($gateway) {
            case 'nexmo':
                $this->Gateway = new \SMS\SMSGatewayNexmo();
                break;
        }

        return $this;
    }

    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function setDebug($debug)
    {
        $this->debug = $debug;

        return $this;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getReceiver()
    {
        return $this->receiver;
    }

    public function getDebug()
    {
        return $this->debug;
    }

    public function getResponse()
    {
        return $this->Gateway->getResponse();
    }

    public function send()
    {
        if ($this->getDebug()) {
            return $this->Gateway->debugSend();
        }
        return $this->Gateway->send($this);
    }
}