<?php


use databoxtech\multisocial\MultiSocial;
use databoxtech\multisocial\Post;
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

    public function testAddAdapter(){
        $ms = new MultiSocial([]);
        $mock = $this->getMockAdapter();
        $ms->addAdapter('mock', $mock);
        $this->assertEquals($mock, $ms->getAdapter('mock'));
    }

    public function testPost(){
        $ms = new MultiSocial([]);
        $mock = $this->getMockAdapter();
        $ms->addAdapter('mock', $mock);
        $post = $this->getMockPost();
        $references = $ms->post($post);
        $this->assertIsArray($references);
    }



    private function getMockAdapter(){
        return $this->prophesize(\databoxtech\multisocial\adapter\SocialAdapter::class)->reveal();
    }

    private function getMockPost(){
        return  new Post('Caption', 'Post Description', [], []);
    }
}
