<?php

namespace SMS;

/**
 * Response class
 */
class Response
{
    /**
     * Validator
     *
     * @var object
     */
    public $Validator = [];

    /**
     * Reponse data property
     *
     * @var array
     */
    public $data;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->Validator = new Validator();
    }

    /**
     * Get errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->Validator->getErrors();
    }

    /**
     * Get response data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set response data
     *
     * @param array $data
     *
     * @return object Response
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}