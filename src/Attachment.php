<?php


namespace databoxtech\multisocial;


class Attachment
{
    public const TYPE_IMAGE = 10;
    public const TYPE_GIF   = 20;
    public const TYPE_VIDEO = 30;
    public const TYPE_DOC   = 40;

    /**
     * @var string file path of the object. Only local file paths are supported
     */
    private $path;
    /**
     * @var string caption of the attachment/ filename
     */
    private $caption;
    /**
     * @var integer type of the attachment. Should be one of TYPE_IMAGE | TYPE_GIF | TYPE_VIDEO | TYPE_DOC
     */
    private $type;

    /**
     * Attachment constructor.
     * @param string $path
     * @param string $caption
     * @param int $type
     */
    public function __construct(string $path, string $caption, int $type)
    {
        $this->path = $path;
        $this->caption = $caption;
        $this->type = $type;
    }


    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
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
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }


}