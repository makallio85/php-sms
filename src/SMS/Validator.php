<?php

namespace SMS;

/**
 * Validation class to validate data before sending
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
     * @param array $data Arror data
     * @return object Validator
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
     * @return bool
     */
    public function validatePhone($phoneNumber)
    {
        return true;
    }
}