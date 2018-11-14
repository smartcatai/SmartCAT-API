<?php

namespace SmartCat\Client\Model;

class FileFormatModel
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var bool
     */
    protected $ocr;
    /**
     * @var string
     */
    protected $mimeType;
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
     * @return bool
     */
    public function getOcr()
    {
        return $this->ocr;
    }
    /**
     * @param bool $ocr
     *
     * @return self
     */
    public function setOcr($ocr = null)
    {
        $this->ocr = $ocr;
        return $this;
    }
    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }
    /**
     * @param string $mimeType
     *
     * @return self
     */
    public function setMimeType($mimeType = null)
    {
        $this->mimeType = $mimeType;
        return $this;
    }
}