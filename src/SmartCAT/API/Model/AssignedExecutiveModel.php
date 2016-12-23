<?php

namespace SmartCAT\API\Model;

class AssignedExecutiveModel
{
    /**
     * @var int
     */
    protected $assignedWordsCount;
    /**
     * @var float
     */
    protected $progress;
    /**
     * @return int
     */
    public function getAssignedWordsCount()
    {
        return $this->assignedWordsCount;
    }
    /**
     * @param int $assignedWordsCount
     *
     * @return self
     */
    public function setAssignedWordsCount($assignedWordsCount = null)
    {
        $this->assignedWordsCount = $assignedWordsCount;
        return $this;
    }
    /**
     * @return float
     */
    public function getProgress()
    {
        return $this->progress;
    }
    /**
     * @param float $progress
     *
     * @return self
     */
    public function setProgress($progress = null)
    {
        $this->progress = $progress;
        return $this;
    }
}