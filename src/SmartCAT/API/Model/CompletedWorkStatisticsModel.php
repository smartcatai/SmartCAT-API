<?php

namespace SmartCAT\API\Model;

class CompletedWorkStatisticsModel
{
    /**
     * @var StatisticsRowModel[]
     */
    protected $statistics;
    /**
     * @var string
     */
    protected $name;
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
}