<?php

namespace SmartCat\Client\Model;

class SegmentTagModel
{
    /**
     * @var int
     */
    protected $tagNumber;
    /**
     * @var string
     */
    protected $tagType;
    /**
     * @var int
     */
    protected $position;
    /**
     * @var bool
     */
    protected $isVirtual;
    /**
     * @var bool
     */
    protected $isInvisible;
    /**
     * @return int
     */
    public function getTagNumber()
    {
        return $this->tagNumber;
    }
    /**
     * @param int $tagNumber
     *
     * @return self
     */
    public function setTagNumber($tagNumber = null)
    {
        $this->tagNumber = $tagNumber;
        return $this;
    }
    /**
     * @return string
     */
    public function getTagType()
    {
        return $this->tagType;
    }
    /**
     * @param string $tagType
     *
     * @return self
     */
    public function setTagType($tagType = null)
    {
        $this->tagType = $tagType;
        return $this;
    }
    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }
    /**
     * @param int $position
     *
     * @return self
     */
    public function setPosition($position = null)
    {
        $this->position = $position;
        return $this;
    }
    /**
     * @return bool
     */
    public function getIsVirtual()
    {
        return $this->isVirtual;
    }
    /**
     * @param bool $isVirtual
     *
     * @return self
     */
    public function setIsVirtual($isVirtual = null)
    {
        $this->isVirtual = $isVirtual;
        return $this;
    }
    /**
     * @return bool
     */
    public function getIsInvisible()
    {
        return $this->isInvisible;
    }
    /**
     * @param bool $isInvisible
     *
     * @return self
     */
    public function setIsInvisible($isInvisible = null)
    {
        $this->isInvisible = $isInvisible;
        return $this;
    }
}