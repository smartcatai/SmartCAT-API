<?php

namespace SmartCat\Client\Model;

class CreateInvoiceModel
{
    /**
     * @var string
     */
    protected $targetCurrency;

    /**
     * @var string[]
     */
    protected $jobIds;

    /**
     * @return string
     */
    public function getTargetCurrency()
    {
        return $this->targetCurrency;
    }

    /**
     * @param string $targetCurrency
     *
     * @return self
     */
    public function setTargetCurrency(string $targetCurrency = null)
    {
        $this->targetCurrency = $targetCurrency;
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
