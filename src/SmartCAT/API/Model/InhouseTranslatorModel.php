<?php

namespace SmartCat\Client\Model;

class InhouseTranslatorModel
{
    /**
     * @var string $id;
     */
    protected $id;

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var string $firstName
     */
    protected $firstName;

    /**
     * @var string $lastName
     */
    protected $lastName;

    /**
     * @var string $externalId
     */
    protected $externalId;

    /**
     * @var ServiceModel[] $services
     */
    protected $services;

    /**
     * @var string[] $clientIds
     */
    protected $clientIds = [];

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return InhouseTranslatorModel
     */
    public function setId(string $id = null)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return InhouseTranslatorModel
     */
    public function setEmail(string $email = null)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return InhouseTranslatorModel
     */
    public function setFirstName(string $firstName = null)
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
     * @return InhouseTranslatorModel
     */
    public function setLastName(string $lastName = null)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return InhouseTranslatorModel
     */
    public function setExternalId(string $externalId = null)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return ServiceModel[]
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param ServiceModel[] $services
     * @return InhouseTranslatorModel
     */
    public function setServices(array $services = [])
    {
        $this->services = $services;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getClientIds()
    {
        return $this->clientIds;
    }

    /**
     * @param string[] $clientIds
     * @return InhouseTranslatorModel
     */
    public function setClientIds(array $clientIds = [])
    {
        $this->clientIds = $clientIds;
        return $this;
    }
}
