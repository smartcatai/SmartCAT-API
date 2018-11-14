<?php

namespace SmartCat\Client\Model;

class NetRateModel
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var float
     */
    protected $newWordsRate;
    /**
     * @var float
     */
    protected $repetitionsRate;
    /**
     * @var TMRangeRateModel[]
     */
    protected $tmMatchRates;
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $id
     *
     * @return self
     */
    public function setId($id = null)
    {
        $this->id = $id;
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
     * @return float
     */
    public function getNewWordsRate()
    {
        return $this->newWordsRate;
    }
    /**
     * @param float $newWordsRate
     *
     * @return self
     */
    public function setNewWordsRate($newWordsRate = null)
    {
        $this->newWordsRate = $newWordsRate;
        return $this;
    }
    /**
     * @return float
     */
    public function getRepetitionsRate()
    {
        return $this->repetitionsRate;
    }
    /**
     * @param float $repetitionsRate
     *
     * @return self
     */
    public function setRepetitionsRate($repetitionsRate = null)
    {
        $this->repetitionsRate = $repetitionsRate;
        return $this;
    }
    /**
     * @return TMRangeRateModel[]
     */
    public function getTmMatchRates()
    {
        return $this->tmMatchRates;
    }
    /**
     * @param TMRangeRateModel[] $tmMatchRates
     *
     * @return self
     */
    public function setTmMatchRates(array $tmMatchRates = null)
    {
        $this->tmMatchRates = $tmMatchRates;
        return $this;
    }
}