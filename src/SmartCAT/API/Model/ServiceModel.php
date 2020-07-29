<?php

namespace SmartCat\Client\Model;

class ServiceModel
{
    /**
     * @var string $serviceType
     */
    protected $serviceType;

    /**
     * @var string $sourceLanguage
     */
    protected $sourceLanguage;

    /**
     * @var string $targetLanguage
     */
    protected $targetLanguage;

    /**
     * @var string $pricePerUnit
     */
    protected $pricePerUnit;

    /**
     * @var string $currency
     */
    protected $currency;

    /**
     * @var string[] $specializations
     */
    protected $specializations = [];

    /**
     * @return string
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * @param string $serviceType
     * @return ServiceModel
     */
    public function setServiceType(string $serviceType)
    {
        $this->serviceType = $serviceType;
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
     * @return ServiceModel
     */
    public function setSourceLanguage(string $sourceLanguage)
    {
        $this->sourceLanguage = $sourceLanguage;
        return $this;
    }

    /**
     * @return string
     */
    public function getTargetLanguage()
    {
        return $this->targetLanguage;
    }

    /**
     * @param string $targetLanguage
     * @return ServiceModel
     */
    public function setTargetLanguage(string $targetLanguage)
    {
        $this->targetLanguage = $targetLanguage;
        return $this;
    }

    /**
     * @return string
     */
    public function getPricePerUnit()
    {
        return $this->pricePerUnit;
    }

    /**
     * @param string $pricePerUnit
     * @return ServiceModel
     */
    public function setPricePerUnit(string $pricePerUnit)
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
     * @return ServiceModel
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getSpecializations()
    {
        return $this->specializations;
    }

    /**
     * @param string[] $specializations
     * @return ServiceModel
     */
    public function setSpecializations(array $specializations = [])
    {
        $this->specializations = $specializations;
        return $this;
    }
}
