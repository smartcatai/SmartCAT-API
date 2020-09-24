<?php

namespace SmartCat\Client\Model;

class SegmentWithMatchesModel
{
    /**
     * @var string
     */
    protected $sourceText;
    /**
     * @var string
     */
    protected $targetText;
    /**
     * @var int
     */
    protected $segmentMatch;
    /**
     * @var TagsFromUnit[]
     */
    protected $tags;
    /**
     * @return string
     */
    public function getSourceText()
    {
        return $this->sourceText;
    }
    /**
     * @param string $sourceText
     *
     * @return self
     */
    public function setSourceText($sourceText = null)
    {
        $this->sourceText = $sourceText;
        return $this;
    }
    /**
     * @return string
     */
    public function getTargetText()
    {
        return $this->targetText;
    }
    /**
     * @param string $targetText
     *
     * @return self
     */
    public function setTargetText($targetText = null)
    {
        $this->targetText = $targetText;
        return $this;
    }
    /**
     * @return int
     */
    public function getSegmentMatch()
    {
        return $this->segmentMatch;
    }
    /**
     * @param int $segmentMatch
     *
     * @return self
     */
    public function setSegmentMatch($segmentMatch = null)
    {
        $this->segmentMatch = $segmentMatch;
        return $this;
    }
    /**
     * @return TagsFromUnit[]
     */
    public function getTags()
    {
        return $this->tags;
    }
    /**
     * @param TagsFromUnit[] $tags
     *
     * @return self
     */
    public function setTags(array $tags = null)
    {
        $this->tags = $tags;
        return $this;
    }
}