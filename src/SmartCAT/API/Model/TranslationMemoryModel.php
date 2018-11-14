<?php

namespace SmartCat\Client\Model;

class TranslationMemoryModel
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $accountId;
    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $sourceLanguage;
    /**
     * @var string[]
     */
    protected $targetLanguages;
    /**
     * @var \DateTime
     */
    protected $createdDate;
    /**
     * @var bool
     */
    protected $isAutomaticallyCreated;
    /**
     * @var int[]
     */
    protected $unitCountByLanguageId;
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
    public function getAccountId()
    {
        return $this->accountId;
    }
    /**
     * @param string $accountId
     *
     * @return self
     */
    public function setAccountId($accountId = null)
    {
        $this->accountId = $accountId;
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
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }
    /**
     * @param \DateTime $createdDate
     *
     * @return self
     */
    public function setCreatedDate(\DateTime $createdDate = null)
    {
        $this->createdDate = $createdDate;
        return $this;
    }
    /**
     * @return bool
     */
    public function getIsAutomaticallyCreated()
    {
        return $this->isAutomaticallyCreated;
    }
    /**
     * @param bool $isAutomaticallyCreated
     *
     * @return self
     */
    public function setIsAutomaticallyCreated($isAutomaticallyCreated = null)
    {
        $this->isAutomaticallyCreated = $isAutomaticallyCreated;
        return $this;
    }
    /**
     * @return int[]
     */
    public function getUnitCountByLanguageId()
    {
        return $this->unitCountByLanguageId;
    }
    /**
     * @param int[] $unitCountByLanguageId
     *
     * @return self
     */
    public function setUnitCountByLanguageId(\ArrayObject $unitCountByLanguageId = null)
    {
        $this->unitCountByLanguageId = $unitCountByLanguageId;
        return $this;
    }
}