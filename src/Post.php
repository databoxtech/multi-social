<?php


namespace databoxtech\multisocial;


class Post
{
    /**
     * @var string caption of the post
     */
    private $caption;
    /**
     * @var string description of the post
     */
    private $description;
    /**
     * @var Attachment[] array of attachments for the post
     */
    private $attachments;
    /**
     * @var string[] array of hash tags for the post
     */
    private $tags;

    /**
     * Post constructor.
     * @param string $caption
     * @param string $description
     * @param Attachment[] $attachments
     * @param string[] $tags
     */
    public function __construct(string $caption, string $description, array $attachments = [], array $tags = [])
    {
        $this->caption = $caption;
        $this->description = $description;
        $this->attachments = $attachments;
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption(string $caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Attachment[]
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * @param Attachment[] $attachments
     */
    public function setAttachments(array $attachments): void
    {
        $this->attachments = $attachments;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param string[] $tags
     */
    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }




}