<?php

namespace SmartCat\Client\Model;

class DocumentWorkflowStageModel
{
    /**
     * @var float
     */
    protected $progress;
    /**
     * @var int
     */
    protected $wordsTranslated;
    /**
     * @var int
     */
    protected $unassignedWordsCount;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var AssignedExecutiveModel[]
     */
    protected $executives;
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
     * @return int
     */
    public function getWordsTranslated()
    {
        return $this->wordsTranslated;
    }
    /**
     * @param int $wordsTranslated
     *
     * @return self
     */
    public function setWordsTranslated($wordsTranslated = null)
    {
        $this->wordsTranslated = $wordsTranslated;
        return $this;
    }
    /**
     * @return int
     */
    public function getUnassignedWordsCount()
    {
        return $this->unassignedWordsCount;
    }
    /**
     * @param int $unassignedWordsCount
     *
     * @return self
     */
    public function setUnassignedWordsCount($unassignedWordsCount = null)
    {
        $this->unassignedWordsCount = $unassignedWordsCount;
        return $this;
    }
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
        return $this;
    }
    /**
     * @return AssignedExecutiveModel[]
     */
    public function getExecutives()
    {
        return $this->executives;
    }
    /**
     * @param AssignedExecutiveModel[] $executives
     *
     * @return self
     */
    public function setExecutives(array $executives = null)
    {
        $this->executives = $executives;
        return $this;
    }
}