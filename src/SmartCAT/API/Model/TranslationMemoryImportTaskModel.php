<?php
/**
 * Created by PhpStorm.
 * User: Diversant_
 * Date: 24.11.2016
 * Time: 0:48
 */

namespace SmartCAT\API\Model;


//TODO: В ручную созданая модель
class TranslationMemoryImportTaskModel
{
    /**
     * @var string
     */
    private $accountId;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $translationMemoryId;

    /**
     * @var string
     */
    private $state;

    /**
     * @var int
     */
    private $insertedUnitCount;

    /**
     * @return string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param string $accountId
     * @return self
     */
    public function setAccountId(string $accountId)
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
     * @return self
     */
    public function setId(string $id)
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
     * @return self
     */
    public function setTranslationMemoryId(string $translationMemoryId)
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
     * @return self
     */
    public function setState(string $state)
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
     * @return self
     */
    public function setInsertedUnitCount(int $insertedUnitCount)
    {
        $this->insertedUnitCount = $insertedUnitCount;
        return $this;
    }


}