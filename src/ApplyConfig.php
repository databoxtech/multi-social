<?php


namespace databoxtech\multisocial;

use databoxtech\multisocial\exception\ConfigRequiredException;

trait ApplyConfig
{

    /**
     * @param array $config
     * @param array $required required configurations
     * @throws ConfigRequiredException
     */
    public function apply_config($config, $required = []){
        foreach ($config as $key => $value){
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }

        foreach ($required as $conf){
            if(!isset($config[$conf])){
                throw new ConfigRequiredException($conf);
            }
        }
    }
}