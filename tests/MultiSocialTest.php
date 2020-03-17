<?php


use databoxtech\multisocial\MultiSocial;
use PHPUnit\Framework\TestCase;

class MultiSocialTest extends TestCase
{

    public function testConstruct()
    {
        $ms = new MultiSocial([]);
        $this->assertNotNull($ms);
    }

    public function testGetAdapter()
    {
        $ms = new MultiSocial([
            'facebook' => [
                'app_id' => '12312312',
                'app_secret' => 'appsecret',
                'access_token' => '',
                'page_id' => '',
                'default_graph_version' => '',
            ]
        ]);

        $this->assertNotNull($ms->getAdapter('facebook'));
        $this->assertNull($ms->getAdapter('twitter'));
    }
}
