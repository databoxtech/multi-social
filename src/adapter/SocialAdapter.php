<?php


namespace databoxtech\multisocial\adapter;


use databoxtech\multisocial\exception\ConfigRequiredException;
use databoxtech\multisocial\exception\SocialException;
use databoxtech\multisocial\Post;

interface SocialAdapter
{
    /**
     * SocialAdapter constructor.
     * @param array $config
     * @throws ConfigRequiredException
     * @throws SocialException
     */
    public function __construct($config);

    /**
     * Post to the social page
     *
     * @param Post $post Post object
     * @return integer Post reference
     * @throws SocialException
     */
    public function post($post);
}