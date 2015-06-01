<?php

namespace SMS;

/**
 * Base gateway class. All gateways must extend this class
 */
class BaseGateway
{
    /**
     * Gateway configuration property
     * @var array
     */
    protected $config = [];
    
    /**
     * Reponse object
     * @var object
     */
    public $Response;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->Response = new Response();
    }

    /**
     * Set config data
     * 
     * @param array $configData
     * @return object BaseGateway
     */
    public function setConfig($configData)
    {
        $this->config = $configData;

        return $this;
    }

    /**
     * Get config value by key
     * 
     * @param string $key Config value to get
     * @return string
     */
    public function getConfig($key)
    {
        return $this->config[$key];
    }
}