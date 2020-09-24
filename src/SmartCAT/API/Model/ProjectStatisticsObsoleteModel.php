<?php

namespace SmartCat\Client\Model;

class ProjectStatisticsObsoleteModel
{
    /**
     * @var StatisticsRowModel[]
     */
    protected $statistics;
    /**
     * @var float
     */
    protected $cost;
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