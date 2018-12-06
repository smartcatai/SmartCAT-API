<?php

namespace SmartCat\Client\Model;

class ProjectModel
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
     * @var string
     */
    protected $description;
    /**
     * @var \DateTime
     */
    protected $deadline;
    /**
     * @var \DateTime
     */
    protected $creationDate;
    /**
     * @var string
     */
    protected $createdByUserId;
    /**
     * @var \DateTime
     */
    protected $modificationDate;
    /**
     * @var string
     */
    protected $sourceLanguage;
    /**
     * @var string[]
     */
    protected $targetLanguages;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var \DateTime
     */
    protected $statusModificationDate;
    /**
     * @var int
     */
    protected $domainId;
    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var ProjectVendorModel[]
     */
    protected $vendors;
    /**
     * @var ProjectWorkflowStageModel[]
     */
    protected $workflowStages;
    /**
     * @var DocumentModel[]
     */
    protected $documents;
    /**
     * @var string
     */
    protected $externalTag;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
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
     * @return string
     */
    public function getCreatedByUserId()
    {
        return $this->createdByUserId;
    }
    /**
     * @param string $createdByUserId
     *
     * @return self
     */
    public function setCreatedByUserId($createdByUserId = null)
    {
        $this->createdByUserId = $createdByUserId;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }
    /**
     * @param \DateTime $modificationDate
     *
     * @return self
     */
    public function setModificationDate(\DateTime $modificationDate = null)
    {
        $this->modificationDate = $modificationDate;
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
     * @return string[]
     */
    public function getTargetLanguages()
    {
        return $this->targetLanguages;
    }
    /**
     * @param string[] $targetLanguages
     *
     * @return self
     */
    public function setTargetLanguages(array $targetLanguages = null)
    {
        $this->targetLanguages = $targetLanguages;
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
     * @return int
     */
    public function getDomainId()
    {
        return $this->domainId;
    }
    /**
     * @param int $domainId
     *
     * @return self
     */
    public function setDomainId($domainId = null)
    {
        $this->domainId = $domainId;
        return $this;
    }
    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }
    /**
     * @param string $clientId
     *
     * @return self
     */
    public function setClientId($clientId = null)
    {
        $this->clientId = $clientId;
        return $this;
    }
    /**
     * @return ProjectVendorModel[]
     */
    public function getVendors()
    {
        return $this->vendors;
    }
    /**
     * @param ProjectVendorModel[] $vendors
     *
     * @return self
     */
    public function setVendors($vendors = null)
    {
        $this->vendors = $vendors;
        return $this;
    }
    /**
     * @return ProjectWorkflowStageModel[]
     */
    public function getWorkflowStages()
    {
        return $this->workflowStages;
    }
    /**
     * @param ProjectWorkflowStageModel[] $workflowStages
     *
     * @return self
     */
    public function setWorkflowStages(array $workflowStages = null)
    {
        $this->workflowStages = $workflowStages;
        return $this;
    }
    /**
     * @return DocumentModel[]
     */
    public function getDocuments()
    {
        return $this->documents;
    }
    /**
     * @param DocumentModel[] $documents
     *
     * @return self
     */
    public function setDocuments(array $documents = null)
    {
        $this->documents = $documents;
        return $this;
    }
    /**
     * @return string
     */
    public function getExternalTag()
    {
        return $this->externalTag;
    }
    /**
     * @param string $externalTag
     *
     * @return self
     */
    public function setExternalTag($externalTag = null)
    {
        $this->externalTag = $externalTag;
        return $this;
    }
}