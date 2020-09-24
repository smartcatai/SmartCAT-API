<?php

namespace SmartCat\Client\Model;

class CancelInvoiceModel
{
    /**
     * @var string
     */
    protected $userId;
    /**
     * @var string
     */
    protected $invoiceId;
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
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }
    /**
     * @param string $invoiceId
     *
     * @return self
     */
    public function setInvoiceId($invoiceId = null)
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }
}