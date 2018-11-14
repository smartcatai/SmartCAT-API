<?php

namespace SmartCat\Client\Model;

class GlossaryModel
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var string[]
     */
    protected $languages;
    /**
     * @var int
     */
    protected $units;
    /**
     * @var int
     */
    protected $unitsPending;
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
    public function getName()
    {
        return $this->name;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }
    /**
     * @param string $clientId
     *
     * @return self
     */
    public function setClientId($clientId = null)
    {
        $this->clientId = $clientId;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getLanguages()
    {
        return $this->languages;
    }
    /**
     * @param string[] $languages
     *
     * @return self
     */
    public function setLanguages(array $languages = null)
    {
        $this->languages = $languages;
        return $this;
    }
    /**
     * @return int
     */
    public function getUnits()
    {
        return $this->units;
    }
    /**
     * @param int $units
     *
     * @return self
     */
    public function setUnits($units = null)
    {
        $this->units = $units;
        return $this;
    }
    /**
     * @return int
     */
    public function getUnitsPending()
    {
        return $this->unitsPending;
    }
    /**
     * @param int $unitsPending
     *
     * @return self
     */
    public function setUnitsPending($unitsPending = null)
    {
        $this->unitsPending = $unitsPending;
        return $this;
    }
}