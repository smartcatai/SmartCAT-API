<?php

namespace SmartCat\Client\Model;

class ProjectChangesModel
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var \DateTime
     */
    protected $deadline;
    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var int
     */
    protected $domainId;
    /**
     * @var string[]
     */
    protected $vendorAccountIds;
    /**
     * @var string
     */
    protected $externalTag;
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
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }
    /**
     * @param \DateTime $deadline
     *
     * @return self
     */
    public function setDeadline(\DateTime $deadline = null)
    {
        $this->deadline = $deadline;
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
     * @return int
     */
    public function getDomainId()
    {
        return $this->domainId;
    }
    /**
     * @param int $domainId
     *
     * @return self
     */
    public function setDomainId($domainId = null)
    {
        $this->domainId = $domainId;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getVendorAccountIds()
    {
        return $this->vendorAccountIds;
    }
    /**
     * @param string[] $vendorAccountIds
     *
     * @return self
     */
    public function setVendorAccountIds($vendorAccountIds = null)
    {
        $this->vendorAccountIds = $vendorAccountIds;
        return $this;
    }
    /**
     * @return string
     */
    public function getExternalTag()
    {
        return $this->externalTag;
    }
    /**
     * @param string $externalTag
     *
     * @return self
     */
    public function setExternalTag($externalTag = null)
    {
        $this->externalTag = $externalTag;
        return $this;
    }
}