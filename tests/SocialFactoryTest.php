<?php


use databoxtech\multisocial\adapter\FacebookAdapter;
use databoxtech\multisocial\SocialFactory;
use PHPUnit\Framework\TestCase;

class SocialFactoryTest extends TestCase
{

    /**
     * @var SocialFactory
     */
    private $factory;


    public function setUp(): void
    {
        $this->factory = new SocialFactory();
    }

    public function testCreateFacebookAdapter()
    {
        $adapter = $this->factory->create('facebook', [
            'app_id' => '12312312',
            'app_secret' => 'appsecret',
            'access_token' => '',
            'page_id' => '',
            'default_graph_version' => '',
        ]);
        $this->assertNotNull($adapter);
        $this->assertInstanceOf(FacebookAdapter::class, $adapter);
    }
}
