<?php


namespace databoxtech\multisocial;


use databoxtech\multisocial\adapter\SocialAdapter;

class MultiSocial
{

    /**
     * @var SocialAdapter[]
     */
    private $adapters = [];

    /**
     * @var SocialFactory
     */
    private $factory;

    /**
     * MultiSocial constructor.
     *
     * Config object is expected to be formatted as below,
     * [
     *      FacebookAdapter::class => [
     *          'app_id' => '',
     *          'app_secret' => '',
     *          'access_token' => '',
     *          'page_id' => '',
     *      ]
     * ]
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->factory = new SocialFactory();

        foreach ($config as $adapterName => $adapterConfig){
            $name = strtolower($adapterName);
            $this->adapters[$name] = $this->factory->create($adapterName, $adapterConfig);
        }
    }

    /**
     * @param string $adapterName
     * @return SocialAdapter|null
     */
    public function getAdapter($adapterName){
        $name = strtolower($adapterName);
        return isset($this->adapters[$name]) ? $this->adapters[$name] : null;
    }


    /**
     * Post specified post to all configured social platforms
     *
     * @param Post $post post to be published
     * @return array references of posts published
     * @throws exception\SocialException
     */
    public function post($post){
        $references = [];
        foreach ($this->adapters as $adapterName => $adapter){
            $references[$adapterName] = $adapter->post($post);
        }
        return $references;
    }

    /**
     * Post specified post to specified social platforms
     *
     * @param Post $post
     * @param string $adapterName
     * @param array $config
     * @return string post reference
     * @throws exception\SocialException
     */
    public static function postTo($post, $adapterName, $config){
        $ms = new self([$adapterName => $config]);
        return array_shift($ms->post($post));
    }

}