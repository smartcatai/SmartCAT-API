<?php

namespace SmartCat\Client\Model;

class CreateInvoiceModel
{
    /**
     * @var string
     */
    protected $userId;
    /**
     * @var string[]
     */
    protected $jobIds;
    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }
    /**
     * @param string $userId
     *
     * @return self
     */
    public function setUserId($userId = null)
    {
        $this->userId = $userId;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getJobIds()
    {
        return $this->jobIds;
    }
    /**
     * @param string[] $jobIds
     *
     * @return self
     */
    public function setJobIds(array $jobIds = null)
    {
        $this->jobIds = $jobIds;
        return $this;
    }
}