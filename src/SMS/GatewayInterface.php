<?php

namespace SMS;

/**
 * Gateway interface class. Every Gateway class must implement this
 */
interface GatewayInterface
{
    /**
     * Send
     */
    public function send(\SMS\SMS $SMS);

    /**
     * Validate
     */
    public function validate(\SMS\SMS $SMS);

    /**
     * Is online?
     */
    public function isOnline();
}