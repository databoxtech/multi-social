<?php

namespace databoxtech\multisocial;

use PHPUnit\Framework\TestCase;

class AttachmentTest extends TestCase
{

    /**
     * @var Attachment
     */
    private $attachment;

    private $_path = '/test/path/sample.jpg';
    private $_caption = 'sample.jpg';
    private $_type = Attachment::TYPE_IMAGE;

    public function setUp(): void
    {
        $this->attachment = new Attachment($this->_path, $this->_caption, $this->_type);
    }


    public function testGetType()
    {
        $this->assertEquals($this->_type, $this->attachment->getType());
    }

    public function testSetType()
    {
        $type = Attachment::TYPE_VIDEO;
        $this->assertNotEquals($type, $this->attachment->getType());
        $this->attachment->setType($type);
        $this->assertEquals($type, $this->attachment->getType());
    }

    public function testGetPath()
    {
        $this->assertEquals($this->_path, $this->attachment->getPath());
    }

    public function testSetPath()
    {
        $path = '/test/path/sample2.png';
        $this->assertNotEquals($path, $this->attachment->getPath());
        $this->attachment->setPath($path);
        $this->assertEquals($path, $this->attachment->getPath());
    }

    public function testGetCaption()
    {
        $this->assertEquals($this->_caption, $this->attachment->getCaption());
    }

    public function testSetCaption()
    {
        $caption = 'sample2.png';
        $this->assertNotEquals($caption, $this->attachment->getCaption());
        $this->attachment->setCaption($caption);
        $this->assertEquals($caption, $this->attachment->getCaption());
    }

    public function test__construct()
    {
        $this->assertEquals($this->_type, $this->attachment->getType());
        $this->assertEquals($this->_path, $this->attachment->getPath());
        $this->assertEquals($this->_caption, $this->attachment->getCaption());
    }
}
