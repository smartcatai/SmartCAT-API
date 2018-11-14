<?php

namespace SmartCat\Client\Model;

class LSPServicesModel
{
    /**
     * @var string
     */
    protected $sourceLanguage;
    /**
     * @var string
     */
    protected $targetLanguage;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $pricePerUnit;
    /**
     * @var string
     */
    protected $pricePerUnitCurrency;
    /**
     * @return string
     */
    protected $serviceTypes;
    /**
     * @return array
     */
    protected $specializations;
    /**
     * @return array
     */
    public function getSourceLanguage()
    {
        return $this->sourceLanguage;
    }
    /**
     * @return string
     */
    public function getTargetLanguage()
    {
        return $this->targetLanguage;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @return string
     */
    public function getPricePerUnit()
    {
        return $this->pricePerUnit;
    }
    /**
     * @return string
     */
    public function getPricePerUnitCurrency()
    {
        return $this->pricePerUnitCurrency;
    }
    /**
     * @return array
     */
    public function getServiceTypes()
    {
        return $this->serviceTypes;
    }
    /**
     * @return array
     */
    public function getSpecializations()
    {
        return $this->specializations;
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
     * @param string $targetLanguage
     *
     * @return self
     */
    public function setTargetLanguage($targetLanguage = null)
    {
        $this->targetLanguage = $targetLanguage;
        return $this;
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
     * @param string $pricePerUnit
     *
     * @return self
     */
    public function setPricePerUnit($pricePerUnit = null)
    {
        $this->pricePerUnit = $pricePerUnit;
        return $this;
    }
    /**
     * @param string $pricePerUnitCurrency
     *
     * @return self
     */
    public function setPricePerUnitCurrency($pricePerUnitCurrency = null)
    {
        $this->pricePerUnitCurrency = $pricePerUnitCurrency;
        return $this;
    }
    /**
     * @param array $serviceTypes
     *
     * @return self
     */
    public function setServiceTypes($serviceTypes = null)
    {
        $this->serviceTypes = $serviceTypes;
        return $this;
    }
    /**
     * @param array $specializations
     *
     * @return self
     */
    public function setSpecializations($specializations = null)
    {
        $this->specializations = $specializations;
        return $this;
    }
}