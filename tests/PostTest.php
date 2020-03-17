<?php


use databoxtech\multisocial\Attachment;
use databoxtech\multisocial\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{

    private $_caption = 'Test Post';
    private $_description = 'This is a test post';
    private $_attachments;
    private $_tags = ['tag1'];

    /**
     * @var Post
     */
    private $post;

    public function setUp(): void
    {
        $this->_attachments = [
            new Attachment('/test/sample.jpg', 'sample.jpg', Attachment::TYPE_IMAGE)
        ];
        $this->post = new Post($this->_caption, $this->_description, $this->_attachments, $this->_tags);
    }

    public function testSetDescription()
    {
        $description = 'Sample description to test';
        $this->assertEquals($this->_description, $this->post->getDescription());
        $this->post->setDescription($description);
        $this->assertEquals($description, $this->post->getDescription());
    }

    public function testGetDescription()
    {
        $this->assertEquals($this->_description, $this->post->getDescription());
    }

    public function testSetCaption()
    {
        $caption = 'Test Caption';
        $this->assertEquals($this->_caption, $this->post->getCaption());
        $this->post->setCaption($caption);
        $this->assertEquals($caption, $this->post->getCaption());
    }

    public function testGetCaption()
    {
        $this->assertEquals($this->_caption, $this->post->getCaption());
    }

    public function testSetAttachments()
    {
        $attachments = [
            new Attachment('/test/videos/sample.mp4', 'sample.mp4', Attachment::TYPE_VIDEO)
        ];
        $this->assertEquals($this->_attachments, $this->post->getAttachments());
        $this->post->setAttachments($attachments);
        $this->assertEquals($attachments, $this->post->getAttachments());
    }

    public function testGetAttachments()
    {
        $this->assertEquals($this->_attachments, $this->post->getAttachments());
    }

    public function testSetTags()
    {
        $tags = ['Test Tag'];
        $this->assertEquals($this->_tags, $this->post->getTags());
        $this->post->setTags($tags);
        $this->assertEquals($tags, $this->post->getTags());
    }

    public function testGetTags()
    {
        $this->assertEquals($this->_tags, $this->post->getTags());
    }

    public function testConstruct()
    {
        $post = new Post($this->_caption, $this->_description);

        $this->assertEquals($this->_caption, $post->getCaption());
        $this->assertEquals($this->_description, $post->getDescription());
        $this->assertEquals([], $post->getAttachments());
        $this->assertEquals([], $post->getTags());
    }

    public function testConstructWithAttachments()
    {
        $post = new Post($this->_caption, $this->_description, $this->_attachments);

        $this->assertEquals($this->_caption, $post->getCaption());
        $this->assertEquals($this->_description, $post->getDescription());
        $this->assertEquals($this->_attachments, $post->getAttachments());
        $this->assertEquals([], $post->getTags());
    }

    public function testConstructWithAttachmentsAndTags()
    {
        $post = new Post($this->_caption, $this->_description, $this->_attachments, $this->_tags);

        $this->assertEquals($this->_caption, $post->getCaption());
        $this->assertEquals($this->_description, $post->getDescription());
        $this->assertEquals($this->_attachments, $post->getAttachments());
        $this->assertEquals($this->_tags, $post->getTags());
    }
}
