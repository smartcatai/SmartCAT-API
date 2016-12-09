<?php

namespace SmartCAT\API\Model;

class CallbackError
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var \DateTime
     */
    protected $created;
    /**
     * @var \DateTime
     */
    protected $expired;
    /**
     * @var string
     */
    protected $applicationId;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var FailResponse
     */
    protected $failResponse;
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
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
    /**
     * @param \DateTime $created
     *
     * @return self
     */
    public function setCreated(\DateTime $created = null)
    {
        $this->created = $created;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getExpired()
    {
        return $this->expired;
    }
    /**
     * @param \DateTime $expired
     *
     * @return self
     */
    public function setExpired(\DateTime $expired = null)
    {
        $this->expired = $expired;
        return $this;
    }
    /**
     * @return string
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }
    /**
     * @param string $applicationId
     *
     * @return self
     */
    public function setApplicationId($applicationId = null)
    {
        $this->applicationId = $applicationId;
        return $this;
    }
    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
    /**
     * @param string $url
     *
     * @return self
     */
    public function setUrl($url = null)
    {
        $this->url = $url;
        return $this;
    }
    /**
     * @return FailResponse
     */
    public function getFailResponse()
    {
        return $this->failResponse;
    }
    /**
     * @param FailResponse $failResponse
     *
     * @return self
     */
    public function setFailResponse(FailResponse $failResponse = null)
    {
        $this->failResponse = $failResponse;
        return $this;
    }
}