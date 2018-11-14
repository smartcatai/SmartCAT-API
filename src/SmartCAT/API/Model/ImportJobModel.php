<?php

namespace SmartCat\Client\Model;

class ImportJobModel
{
    /**
     * @var string
     */
    protected $freelancerId;
    /**
     * @var string
     */
    protected $serviceType;
    /**
     * @var string
     */
    protected $jobDescription;
    /**
     * @var string
     */
    protected $unitsType;
    /**
     * @var float
     */
    protected $unitsAmount;
    /**
     * @var float
     */
    protected $pricePerUnit;
    /**
     * @var string
     */
    protected $currency;
    /**
     * @return string
     */
    public function getFreelancerId()
    {
        return $this->freelancerId;
    }
    /**
     * @param string $freelancerId
     *
     * @return self
     */
    public function setFreelancerId($freelancerId = null)
    {
        $this->freelancerId = $freelancerId;
        return $this;
    }
    /**
     * @return string
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }
    /**
     * @param string $serviceType
     *
     * @return self
     */
    public function setServiceType($serviceType = null)
    {
        $this->serviceType = $serviceType;
        return $this;
    }
    /**
     * @return string
     */
    public function getJobDescription()
    {
        return $this->jobDescription;
    }
    /**
     * @param string $jobDescription
     *
     * @return self
     */
    public function setJobDescription($jobDescription = null)
    {
        $this->jobDescription = $jobDescription;
        return $this;
    }
    /**
     * @return string
     */
    public function getUnitsType()
    {
        return $this->unitsType;
    }
    /**
     * @param string $unitsType
     *
     * @return self
     */
    public function setUnitsType($unitsType = null)
    {
        $this->unitsType = $unitsType;
        return $this;
    }
    /**
     * @return float
     */
    public function getUnitsAmount()
    {
        return $this->unitsAmount;
    }
    /**
     * @param float $unitsAmount
     *
     * @return self
     */
    public function setUnitsAmount($unitsAmount = null)
    {
        $this->unitsAmount = $unitsAmount;
        return $this;
    }
    /**
     * @return float
     */
    public function getPricePerUnit()
    {
        return $this->pricePerUnit;
    }
    /**
     * @param float $pricePerUnit
     *
     * @return self
     */
    public function setPricePerUnit($pricePerUnit = null)
    {
        $this->pricePerUnit = $pricePerUnit;
        return $this;
    }
    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
    /**
     * @param string $currency
     *
     * @return self
     */
    public function setCurrency($currency = null)
    {
        $this->currency = $currency;
        return $this;
    }
}