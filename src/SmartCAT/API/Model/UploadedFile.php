<?php

namespace SmartCAT\API\Model;

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
}