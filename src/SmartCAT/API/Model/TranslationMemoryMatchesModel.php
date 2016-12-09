<?php
/**
 * Created by PhpStorm.
 * User: Diversant_
 * Date: 24.11.2016
 * Time: 0:48
 */

namespace SmartCAT\API\Model;

//TODO: В ручную созданая модель
class TranslationMemoryMatchesModel
{
    /**
     * @var string
     */
    private $sourceText;

    /**
     * @var string
     */
    private $targetText;

    /**
     * @var float
     */
    private $segmentMatch;

    /**
     * @var TranslationMemoryMatchesTagsModel[]
     */
    private $tags;

    /**
     * @return string
     */
    public function getSourceText(): string
    {
        return $this->sourceText;
    }

    /**
     * @param string $sourceText
     * @return self
     */
    public function setSourceText(string $sourceText)
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
     * @return self
     */
    public function setTargetText(string $targetText)
    {
        $this->targetText = $targetText;
        return $this;
    }

    /**
     * @return float
     */
    public function getSegmentMatch()
    {
        return $this->segmentMatch;
    }

    /**
     * @param float $segmentMatch
     * @return self
     */
    public function setSegmentMatch(float $segmentMatch)
    {
        $this->segmentMatch = $segmentMatch;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return self
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
        return $this;
    }

}