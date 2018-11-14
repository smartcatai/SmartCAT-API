<?php

namespace SmartCat\Client\Model;

class TmMatchesRequest
{
    /**
     * @var string
     */
    protected $sourceLanguage;
    /**
     * @var string
     */
    protected $targetLanguage;
    /**
     * @var SegmentModel
     */
    protected $segmentModel;
    /**
     * @var bool
     */
    protected $checkFuzzyMatches;
    /**
     * @return string
     */
    public function getSourceLanguage()
    {
        return $this->sourceLanguage;
    }
    /**
     * @param string $sourceLanguage
     *
     * @return self
     */
    public function setSourceLanguage($sourceLanguage = null)
    {
        $this->sourceLanguage = $sourceLanguage;
        return $this;
    }
    /**
     * @return string
     */
    public function getTargetLanguage()
    {
        return $this->targetLanguage;
    }
    /**
     * @param string $targetLanguage
     *
     * @return self
     */
    public function setTargetLanguage($targetLanguage = null)
    {
        $this->targetLanguage = $targetLanguage;
        return $this;
    }
    /**
     * @return SegmentModel
     */
    public function getSegmentModel()
    {
        return $this->segmentModel;
    }
    /**
     * @param SegmentModel $segmentModel
     *
     * @return self
     */
    public function setSegmentModel(SegmentModel $segmentModel = null)
    {
        $this->segmentModel = $segmentModel;
        return $this;
    }
    /**
     * @return bool
     */
    public function getCheckFuzzyMatches()
    {
        return $this->checkFuzzyMatches;
    }
    /**
     * @param bool $checkFuzzyMatches
     *
     * @return self
     */
    public function setCheckFuzzyMatches($checkFuzzyMatches = null)
    {
        $this->checkFuzzyMatches = $checkFuzzyMatches;
        return $this;
    }
}