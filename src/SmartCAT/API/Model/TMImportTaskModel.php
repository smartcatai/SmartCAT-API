<?php

namespace SmartCat\Client\Model;

class TMImportTaskModel
{
    /**
     * @var string
     */
    protected $accountId;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $translationMemoryId;
    /**
     * @var string
     */
    protected $state;
    /**
     * @var int
     */
    protected $insertedUnitCount;
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
    public function getTranslationMemoryId()
    {
        return $this->translationMemoryId;
    }
    /**
     * @param string $translationMemoryId
     *
     * @return self
     */
    public function setTranslationMemoryId($translationMemoryId = null)
    {
        $this->translationMemoryId = $translationMemoryId;
        return $this;
    }
    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
    /**
     * @param string $state
     *
     * @return self
     */
    public function setState($state = null)
    {
        $this->state = $state;
        return $this;
    }
    /**
     * @return int
     */
    public function getInsertedUnitCount()
    {
        return $this->insertedUnitCount;
    }
    /**
     * @param int $insertedUnitCount
     *
     * @return self
     */
    public function setInsertedUnitCount($insertedUnitCount = null)
    {
        $this->insertedUnitCount = $insertedUnitCount;
        return $this;
    }
}