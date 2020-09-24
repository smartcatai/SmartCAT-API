<?php

namespace SmartCat\Client\Model;

class StatisticsRowModel
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $words;
    /**
     * @var float
     */
    protected $percent;
    /**
     * @var int
     */
    protected $segments;
    /**
     * @var float
     */
    protected $pages;
    /**
     * @var int
     */
    protected $charsWithoutSpaces;
    /**
     * @var int
     */
    protected $charsWithSpaces;
    /**
     * @var float
     */
    protected $cost;
    /**
     * @var float
     */
    protected $effectiveWordsForBilling;
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
     * @return int
     */
    public function getWords()
    {
        return $this->words;
    }
    /**
     * @param int $words
     *
     * @return self
     */
    public function setWords($words = null)
    {
        $this->words = $words;
        return $this;
    }
    /**
     * @return float
     */
    public function getPercent()
    {
        return $this->percent;
    }
    /**
     * @param float $percent
     *
     * @return self
     */
    public function setPercent($percent = null)
    {
        $this->percent = $percent;
        return $this;
    }
    /**
     * @return int
     */
    public function getSegments()
    {
        return $this->segments;
    }
    /**
     * @param int $segments
     *
     * @return self
     */
    public function setSegments($segments = null)
    {
        $this->segments = $segments;
        return $this;
    }
    /**
     * @return float
     */
    public function getPages()
    {
        return $this->pages;
    }
    /**
     * @param float $pages
     *
     * @return self
     */
    public function setPages($pages = null)
    {
        $this->pages = $pages;
        return $this;
    }
    /**
     * @return int
     */
    public function getCharsWithoutSpaces()
    {
        return $this->charsWithoutSpaces;
    }
    /**
     * @param int $charsWithoutSpaces
     *
     * @return self
     */
    public function setCharsWithoutSpaces($charsWithoutSpaces = null)
    {
        $this->charsWithoutSpaces = $charsWithoutSpaces;
        return $this;
    }
    /**
     * @return int
     */
    public function getCharsWithSpaces()
    {
        return $this->charsWithSpaces;
    }
    /**
     * @param int $charsWithSpaces
     *
     * @return self
     */
    public function setCharsWithSpaces($charsWithSpaces = null)
    {
        $this->charsWithSpaces = $charsWithSpaces;
        return $this;
    }
    /**
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }
    /**
     * @param float $cost
     *
     * @return self
     */
    public function setCost($cost = null)
    {
        $this->cost = $cost;
        return $this;
    }
    /**
     * @return float
     */
    public function getEffectiveWordsForBilling()
    {
        return $this->effectiveWordsForBilling;
    }
    /**
     * @param float $effectiveWordsForBilling
     *
     * @return self
     */
    public function setEffectiveWordsForBilling($effectiveWordsForBilling = null)
    {
        $this->effectiveWordsForBilling = $effectiveWordsForBilling;
        return $this;
    }
}