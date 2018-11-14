<?php

namespace SmartCat\Client\Model;

class DocumentModel
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
     * @var \DateTime
     */
    protected $creationDate;
    /**
     * @var \DateTime
     */
    protected $deadline;
    /**
     * @var string
     */
    protected $sourceLanguage;
    /**
     * @var string
     */
    protected $documentDisassemblingStatus;
    /**
     * @var string
     */
    protected $targetLanguage;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var int
     */
    protected $wordsCount;
    /**
     * @var \DateTime
     */
    protected $statusModificationDate;
    /**
     * @var bool
     */
    protected $pretranslateCompleted;
    /**
     * @var DocumentWorkflowStageModel[]
     */
    protected $workflowStages;
    /**
     * @var string
     */
    protected $externalId;
    /**
     * @var string
     */
    protected $metaInfo;
    /**
     * @var bool
     */
    protected $placeholdersAreEnabled;
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
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    /**
     * @param \DateTime $creationDate
     *
     * @return self
     */
    public function setCreationDate(\DateTime $creationDate = null)
    {
        $this->creationDate = $creationDate;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }
    /**
     * @param \DateTime $deadline
     *
     * @return self
     */
    public function setDeadline(\DateTime $deadline = null)
    {
        $this->deadline = $deadline;
        return $this;
    }
    /**
     * @return string
     */
    public function getSourceLanguage()
    {
        return $this->sourceLanguage;
    }
    /**
     * @param string $sourceLanguage
     *
     * @return self
     */
    public function setSourceLanguage($sourceLanguage = null)
    {
        $this->sourceLanguage = $sourceLanguage;
        return $this;
    }
    /**
     * @return string
     */
    public function getDocumentDisassemblingStatus()
    {
        return $this->documentDisassemblingStatus;
    }
    /**
     * @param string $documentDisassemblingStatus
     *
     * @return self
     */
    public function setDocumentDisassemblingStatus($documentDisassemblingStatus = null)
    {
        $this->documentDisassemblingStatus = $documentDisassemblingStatus;
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
     * @return int
     */
    public function getWordsCount()
    {
        return $this->wordsCount;
    }
    /**
     * @param int $wordsCount
     *
     * @return self
     */
    public function setWordsCount($wordsCount = null)
    {
        $this->wordsCount = $wordsCount;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getStatusModificationDate()
    {
        return $this->statusModificationDate;
    }
    /**
     * @param \DateTime $statusModificationDate
     *
     * @return self
     */
    public function setStatusModificationDate(\DateTime $statusModificationDate = null)
    {
        $this->statusModificationDate = $statusModificationDate;
        return $this;
    }
    /**
     * @return bool
     */
    public function getPretranslateCompleted()
    {
        return $this->pretranslateCompleted;
    }
    /**
     * @param bool $pretranslateCompleted
     *
     * @return self
     */
    public function setPretranslateCompleted($pretranslateCompleted = null)
    {
        $this->pretranslateCompleted = $pretranslateCompleted;
        return $this;
    }
    /**
     * @return DocumentWorkflowStageModel[]
     */
    public function getWorkflowStages()
    {
        return $this->workflowStages;
    }
    /**
     * @param DocumentWorkflowStageModel[] $workflowStages
     *
     * @return self
     */
    public function setWorkflowStages(array $workflowStages = null)
    {
        $this->workflowStages = $workflowStages;
        return $this;
    }
    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }
    /**
     * @param string $externalId
     *
     * @return self
     */
    public function setExternalId($externalId = null)
    {
        $this->externalId = $externalId;
        return $this;
    }
    /**
     * @return string
     */
    public function getMetaInfo()
    {
        return $this->metaInfo;
    }
    /**
     * @param string $metaInfo
     *
     * @return self
     */
    public function setMetaInfo($metaInfo = null)
    {
        $this->metaInfo = $metaInfo;
        return $this;
    }
    /**
     * @return bool
     */
    public function getPlaceholdersAreEnabled()
    {
        return $this->placeholdersAreEnabled;
    }
    /**
     * @param bool $placeholdersAreEnabled
     *
     * @return self
     */
    public function setPlaceholdersAreEnabled($placeholdersAreEnabled = null)
    {
        $this->placeholdersAreEnabled = $placeholdersAreEnabled;
        return $this;
    }
}