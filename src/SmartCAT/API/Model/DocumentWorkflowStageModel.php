<?php

namespace SmartCAT\API\Model;

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
     * @var string
     */
    protected $status;
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
}