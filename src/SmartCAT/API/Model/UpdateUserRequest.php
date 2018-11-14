<?php

namespace SmartCat\Client\Model;

class UpdateUserRequest
{
    /**
     * @var string
     */
    protected $firstName;
    /**
     * @var string
     */
    protected $lastName;
    /**
     * @var string
     */
    protected $rightsGroup;
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    /**
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName($firstName = null)
    {
        $this->firstName = $firstName;
        return $this;
    }
    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    /**
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;
        return $this;
    }
    /**
     * @return string
     */
    public function getRightsGroup()
    {
        return $this->rightsGroup;
    }
    /**
     * @param string $rightsGroup
     *
     * @return self
     */
    public function setRightsGroup($rightsGroup = null)
    {
        $this->rightsGroup = $rightsGroup;
        return $this;
    }
}