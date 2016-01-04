<?php

namespace SMS;

/**
 * Class Validator
 *
 * Validate data before sending
 *
 * @package SMS
 */
class Validator
{
    /**
     * Property that holds array of errors
     *
     * @var array
     */
    public $errors = [];

    /**
     * Set new error
     *
     * @param array $data Error data
     *
     * @return $this
     */
    public function setError(Array $data)
    {
        $this->errors[] = $data;

        return $this;
    }

    /**
     * Get errors
     *
     * @return array Errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Validate phone number
     *
     * @param string $phoneNumber Phone number to validate
     *
     * @return bool
     */
    public function validatePhone($phoneNumber)
    {
        return $phoneNumber !== null;
    }
}