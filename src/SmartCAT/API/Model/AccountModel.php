<?php

namespace SmartCAT\API\Model;

class AccountModel
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
     * @var bool
     */
    protected $isPersonal;
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
     * @return bool
     */
    public function getIsPersonal()
    {
        return $this->isPersonal;
    }
    /**
     * @param bool $isPersonal
     *
     * @return self
     */
    public function setIsPersonal($isPersonal = null)
    {
        $this->isPersonal = $isPersonal;
        return $this;
    }
}