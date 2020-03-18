<?php


namespace databoxtech\multisocial\exception;


class ConfigRequiredException extends  \Exception
{


    /**
     * ConfigRequiredException constructor.
     * @param string $config missing config key
     */
    public function __construct($config)
    {
        parent::__construct("Missing configuration value for {$config}");
    }
}