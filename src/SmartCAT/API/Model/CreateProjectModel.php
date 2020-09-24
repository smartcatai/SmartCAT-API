<?php

namespace SmartCat\Client\Model;

class CreateProjectModel
{
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
     * @var string
     */
    protected $sourceLanguage;
    /**
     * @var string[]
     */
    protected $targetLanguages;
    /**
     * @var int
     */
    protected $domainId;
    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var string[]
     */
    protected $vendorAccountIds;
    /**
     * @var bool
     */
    protected $assignToVendor;
    /**
     * @var bool
     */
    protected $useMT;
    /**
     * @var bool
     */
    protected $pretranslate;
    /**
     * @var string
     */
    protected $translationMemoryName;
    /**
     * @var bool
     */
    protected $useTranslationMemory;
    /**
     * @var bool
     */
    protected $autoPropagateRepetitions;
    /**
     * @var string[]
     */
    protected $disassembleAlgorithmNames;
    /**
     * @var CreateDocumentPropertyModel[]
     */
    protected $documentProperties;
    /**
     * @var string[]
     */
    protected $workflowStages;
    /**
     * @var bool
     */
    protected $isForTesting;
    /**
     * @var string
     */
    protected $externalTag;
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
     * @return string[]
     */
    public function getVendorAccountIds()
    {
        return $this->vendorAccountIds;
    }
    /**
     * @param string[] $vendorAccountIds
     *
     * @return self
     */
    public function setVendorAccountIds($vendorAccountIds = null)
    {
        $this->vendorAccountIds = $vendorAccountIds;
        return $this;
    }
    /**
     * @return bool
     */
    public function getAssignToVendor()
    {
        return $this->assignToVendor;
    }
    /**
     * @param bool $assignToVendor
     *
     * @return self
     */
    public function setAssignToVendor($assignToVendor = null)
    {
        $this->assignToVendor = $assignToVendor;
        return $this;
    }
    /**
     * @return bool
     */
    public function getUseMT()
    {
        return $this->useMT;
    }
    /**
     * @param bool $useMT
     *
     * @return self
     */
    public function setUseMT($useMT = null)
    {
        $this->useMT = $useMT;
        return $this;
    }
    /**
     * @return bool
     */
    public function getPretranslate()
    {
        return $this->pretranslate;
    }
    /**
     * @param bool $pretranslate
     *
     * @return self
     */
    public function setPretranslate($pretranslate = null)
    {
        $this->pretranslate = $pretranslate;
        return $this;
    }
    /**
     * @return string
     */
    public function getTranslationMemoryName()
    {
        return $this->translationMemoryName;
    }
    /**
     * @param string $translationMemoryName
     *
     * @return self
     */
    public function setTranslationMemoryName($translationMemoryName = null)
    {
        $this->translationMemoryName = $translationMemoryName;
        return $this;
    }
    /**
     * @return bool
     */
    public function getUseTranslationMemory()
    {
        return $this->useTranslationMemory;
    }
    /**
     * @param bool $useTranslationMemory
     *
     * @return self
     */
    public function setUseTranslationMemory($useTranslationMemory = null)
    {
        $this->useTranslationMemory = $useTranslationMemory;
        return $this;
    }
    /**
     * @return bool
     */
    public function getAutoPropagateRepetitions()
    {
        return $this->autoPropagateRepetitions;
    }
    /**
     * @param bool $autoPropagateRepetitions
     *
     * @return self
     */
    public function setAutoPropagateRepetitions($autoPropagateRepetitions = null)
    {
        $this->autoPropagateRepetitions = $autoPropagateRepetitions;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getDisassembleAlgorithmNames()
    {
        return $this->disassembleAlgorithmNames;
    }
    /**
     * @param string[] $disassembleAlgorithmNames
     *
     * @return self
     */
    public function setDisassembleAlgorithmNames(array $disassembleAlgorithmNames = null)
    {
        $this->disassembleAlgorithmNames = $disassembleAlgorithmNames;
        return $this;
    }
    /**
     * @return CreateDocumentPropertyModel[]
     */
    public function getDocumentProperties()
    {
        return $this->documentProperties;
    }
    /**
     * @param CreateDocumentPropertyModel[] $documentProperties
     *
     * @return self
     */
    public function setDocumentProperties(array $documentProperties = null)
    {
        $this->documentProperties = $documentProperties;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getWorkflowStages()
    {
        return $this->workflowStages;
    }
    /**
     * @param string[] $workflowStages
     *
     * @return self
     */
    public function setWorkflowStages(array $workflowStages = null)
    {
        $this->workflowStages = $workflowStages;
        return $this;
    }
    /**
     * @return bool
     */
    public function getIsForTesting()
    {
        return $this->isForTesting;
    }
    /**
     * @param bool $isForTesting
     *
     * @return self
     */
    public function setIsForTesting($isForTesting = null)
    {
        $this->isForTesting = $isForTesting;
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