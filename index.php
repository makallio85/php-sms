<?php

require_once('Settings.php');
require_once('SMS.php');
require_once('SMSGateway.php');
require_once('SMSGatewayNexmo.php');

$SMS = new \SMS\SMS('nexmo');
$SMS->setSender('Insert sender number or id here.')
    ->setReceiver('Insert receiver number here.')
    ->setMessage('Insert your test message here.')
    ->send();
$reponse = $SMS->getResponse();
