<?php


namespace databoxtech\multisocial;


use databoxtech\multisocial\adapter\SocialAdapter;

class SocialFactory
{

    /**
     * Create a new instance of social adapter
     *
     * @param string $name $name
     * @param array $config
     * @return SocialAdapter
     */
    public function create(string $name, array $config){
        $class = $this->getAdapterClassname($name);
        if (!class_exists($class)) {
            throw new \RuntimeException("Class '$class' not found");
        }
        return new $class($config);
    }

    /**
     * @param string $name adapter name
     * @return string PSR-0 classpath
     */
    private function getAdapterClassname(string $name){
        $name = ucfirst($name);
        // replace underscores with namespace marker, PSR-0 style
        $name = str_replace('_', '\\', $name);
        return '\\databoxtech\\multisocial\\adapter\\'.$name.'Adapter';
    }
}