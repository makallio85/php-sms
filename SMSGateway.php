<?php

namespace SMS;

interface SMSGateway 
{
    public function isOnline();
    public function debugSend();
    public function send(\SMS\SMS $SMS);
    public function getResponse();
}