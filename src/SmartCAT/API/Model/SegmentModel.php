<?php

namespace SmartCat\Client\Model;

class SegmentModel
{
    /**
     * @var string
     */
    protected $text;
    /**
     * @var string
     */
    protected $prevContext;
    /**
     * @var string
     */
    protected $nextContext;
    /**
     * @var SegmentTagModel[]
     */
    protected $tags;
    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
    /**
     * @param string $text
     *
     * @return self
     */
    public function setText($text = null)
    {
        $this->text = $text;
        return $this;
    }
    /**
     * @return string
     */
    public function getPrevContext()
    {
        return $this->prevContext;
    }
    /**
     * @param string $prevContext
     *
     * @return self
     */
    public function setPrevContext($prevContext = null)
    {
        $this->prevContext = $prevContext;
        return $this;
    }
    /**
     * @return string
     */
    public function getNextContext()
    {
        return $this->nextContext;
    }
    /**
     * @param string $nextContext
     *
     * @return self
     */
    public function setNextContext($nextContext = null)
    {
        $this->nextContext = $nextContext;
        return $this;
    }
    /**
     * @return SegmentTagModel[]
     */
    public function getTags()
    {
        return $this->tags;
    }
    /**
     * @param SegmentTagModel[] $tags
     *
     * @return self
     */
    public function setTags(array $tags = null)
    {
        $this->tags = $tags;
        return $this;
    }
}