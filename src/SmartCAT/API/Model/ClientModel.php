<?php

namespace SmartCat\Client\Model;

class ClientModel
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
     * @var NetRateModel
     */
    protected $netRate;
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
     * @return NetRateModel
     */
    public function getNetRate()
    {
        return $this->netRate;
    }
    /**
     * @param NetRateModel $netRate
     *
     * @return self
     */
    public function setNetRate(NetRateModel $netRate = null)
    {
        $this->netRate = $netRate;
        return $this;
    }
}