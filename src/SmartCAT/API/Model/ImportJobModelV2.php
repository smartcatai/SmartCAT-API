<?php

namespace SmartCat\Client\Model;

class ImportJobModelV2
{
    /**
     * @var string
     */
    protected $supplierEmail;

    /**
     * @var string
     */
    protected $supplierName;

    /**
     * @var string
     */
    protected $supplierType;

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
     * @var string
     */
    protected $externalNumber;

    /**
     * @return string
     */
    public function getSupplierEmail()
    {
        return $this->supplierEmail;
    }

    /**
     * @param string $supplierEmail
     */
    public function setSupplierEmail($supplierEmail = null)
    {
        $this->supplierEmail = $supplierEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getSupplierName()
    {
        return $this->supplierName;
    }

    /**
     * @param string $supplierName
     */
    public function setSupplierName($supplierName = null)
    {
        $this->supplierName = $supplierName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSupplierType()
    {
        return $this->supplierType;
    }

    /**
     * @param string $supplierType
     */
    public function setSupplierType($supplierType = null)
    {
        $this->supplierType = $supplierType;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalNumber()
    {
        return $this->externalNumber;
    }

    /**
     * @param string $externalNumber
     */
    public function setExternalNumber($externalNumber = null)
    {
        $this->externalNumber = $externalNumber;
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