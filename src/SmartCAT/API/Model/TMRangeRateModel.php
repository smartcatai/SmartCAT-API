<?php

namespace SmartCat\Client\Model;

class TMRangeRateModel
{
    /**
     * @var int
     */
    protected $fromQuality;
    /**
     * @var int
     */
    protected $toQuality;
    /**
     * @var float
     */
    protected $value;
    /**
     * @return int
     */
    public function getFromQuality()
    {
        return $this->fromQuality;
    }
    /**
     * @param int $fromQuality
     *
     * @return self
     */
    public function setFromQuality($fromQuality = null)
    {
        $this->fromQuality = $fromQuality;
        return $this;
    }
    /**
     * @return int
     */
    public function getToQuality()
    {
        return $this->toQuality;
    }
    /**
     * @param int $toQuality
     *
     * @return self
     */
    public function setToQuality($toQuality = null)
    {
        $this->toQuality = $toQuality;
        return $this;
    }
    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * @param float $value
     *
     * @return self
     */
    public function setValue($value = null)
    {
        $this->value = $value;
        return $this;
    }
}