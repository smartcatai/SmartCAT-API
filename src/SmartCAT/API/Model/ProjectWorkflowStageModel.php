<?php

namespace SmartCat\Client\Model;

class ProjectWorkflowStageModel
{
    /**
     * @var float
     */
    protected $progress;
    /**
     * @var string
     */
    protected $stageType;
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
    /**
     * @return string
     */
    public function getStageType()
    {
        return $this->stageType;
    }
    /**
     * @param string $stageType
     *
     * @return self
     */
    public function setStageType($stageType = null)
    {
        $this->stageType = $stageType;
        return $this;
    }
}