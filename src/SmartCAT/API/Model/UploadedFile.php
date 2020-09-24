<?php

namespace SmartCat\Client\Model;

class UploadedFile
{
    /**
     * @var string
     */
    protected $fullName;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $extension;
    /**
     * @var string
     */
    protected $mediaType;
    /**
     * @var int
     */
    protected $fileSize;
    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }
    /**
     * @param string $fullName
     *
     * @return self
     */
    public function setFullName($fullName = null)
    {
        $this->fullName = $fullName;
        return $this;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }
    /**
     * @param string $extension
     *
     * @return self
     */
    public function setExtension($extension = null)
    {
        $this->extension = $extension;
        return $this;
    }
    /**
     * @return string
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }
    /**
     * @param string $mediaType
     *
     * @return self
     */
    public function setMediaType($mediaType = null)
    {
        $this->mediaType = $mediaType;
        return $this;
    }
    /**
     * @return int
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }
    /**
     * @param int $fileSize
     *
     * @return self
     */
    public function setFileSize($fileSize = null)
    {
        $this->fileSize = $fileSize;
        return $this;
    }
}