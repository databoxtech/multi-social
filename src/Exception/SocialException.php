<?php


namespace databoxtech\multisocial\exception;


class SocialException extends  \Exception
{
    /**
     * SocialCreatePostException constructor.
     * @param string $adapter name of the adapter
     * @param string $message exception message
     */
    public function __construct($adapter, $message)
    {
        parent::__construct("{$adapter} | {$message}");
    }
}