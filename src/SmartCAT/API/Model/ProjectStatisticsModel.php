<?php

namespace SmartCAT\API\Model;

class ProjectStatisticsModel
{
    /**
     * @var string
     */
    protected $language;
    /**
     * @var StatisticsRowModel[]
     */
    protected $statistics;
    /**
     * @var float
     */
    protected $cost;
    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
    /**
     * @param string $language
     *
     * @return self
     */
    public function setLanguage($language = null)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * @return StatisticsRowModel[]
     */
    public function getStatistics()
    {
        return $this->statistics;
    }
    /**
     * @param StatisticsRowModel[] $statistics
     *
     * @return self
     */
    public function setStatistics(array $statistics = null)
    {
        $this->statistics = $statistics;
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
}