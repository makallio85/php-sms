<?php

namespace SMS;

/**
 * Interface GatewayInterface
 *
 * @package SMS
 */
interface GatewayInterface
{
    /**
     * Send
     *
     * @param \SMS\SMS $SMS
     *
     * @return mixed
     */
    public function send(SMS $SMS);

    /**
     * Validate
     *
     * @param \SMS\SMS $SMS
     *
     * @return mixed
     */
    public function validate(SMS $SMS);

    /**
     * Is online
     *
     * @return mixed
     */
    public function isOnline();
}