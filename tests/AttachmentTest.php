<?php

namespace databoxtech\multisocial;

use PHPUnit\Framework\TestCase;

class AttachmentTest extends TestCase
{

    /**
     * @var Attachment
     */
    private $attachement;

    private $_path = '/test/path/sample.jpg';
    private $_caption = 'sample.jpg';
    private $_type = Attachment::TYPE_IMAGE;

    public function setUp(): void
    {
        $this->attachement = new Attachment($this->_path, $this->_caption, $this->_type);
    }


    public function testGetType()
    {
        $this->assertEquals($this->_type, $this->attachement->getType());
    }

    public function testSetType()
    {
        $attachement = new Attachment($this->_path, $this->_caption, Attachment::TYPE_IMAGE);
        $attachement->setType(Attachment::TYPE_VIDEO);
        $this->assertEquals(Attachment::TYPE_VIDEO, $this->attachement->getType());
    }

    public function testGetPath()
    {

    }

    public function testSetCaption()
    {

    }

    public function testSetPath()
    {

    }

    public function testGetCaption()
    {

    }

    public function test__construct()
    {

    }
}
