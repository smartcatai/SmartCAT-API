<?php

namespace SmartCat\Client\Model;

class ExecutiveStatisticsModel
{
    /**
     * @var ExecutiveModel
     */
    protected $executive;
    /**
     * @var string
     */
    protected $stageType;
    /**
     * @var int
     */
    protected $stageNumber;
    /**
     * @var string
     */
    protected $targetLanguage;
    /**
     * @var StatisticsRowModel[]
     */
    protected $total;
    /**
     * @var DocumentStatisticsModel[]
     */
    protected $documents;
    /**
     * @return ExecutiveModel
     */
    public function getExecutive()
    {
        return $this->executive;
    }
    /**
     * @param ExecutiveModel $executive
     *
     * @return self
     */
    public function setExecutive(ExecutiveModel $executive = null)
    {
        $this->executive = $executive;
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
    /**
     * @return int
     */
    public function getStageNumber()
    {
        return $this->stageNumber;
    }
    /**
     * @param int $stageNumber
     *
     * @return self
     */
    public function setStageNumber($stageNumber = null)
    {
        $this->stageNumber = $stageNumber;
        return $this;
    }
    /**
     * @return string
     */
    public function getTargetLanguage()
    {
        return $this->targetLanguage;
    }
    /**
     * @param string $targetLanguage
     *
     * @return self
     */
    public function setTargetLanguage($targetLanguage = null)
    {
        $this->targetLanguage = $targetLanguage;
        return $this;
    }
    /**
     * @return StatisticsRowModel[]
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * @param StatisticsRowModel[] $total
     *
     * @return self
     */
    public function setTotal(array $total = null)
    {
        $this->total = $total;
        return $this;
    }
    /**
     * @return DocumentStatisticsModel[]
     */
    public function getDocuments()
    {
        return $this->documents;
    }
    /**
     * @param DocumentStatisticsModel[] $documents
     *
     * @return self
     */
    public function setDocuments(array $documents = null)
    {
        $this->documents = $documents;
        return $this;
    }
}