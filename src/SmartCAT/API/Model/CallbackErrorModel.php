<?php

namespace SmartCat\Client\Model;

class CallbackErrorModel
{
    /**
     * @var \DateTime
     */
    protected $created;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $reason;
    /**
     * @var int
     */
    protected $code;
    /**
     * @var string
     */
    protected $content;
    /**
     * @var string[]
     */
    protected $sourceIds;
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
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }
    /**
     * @param string $reason
     *
     * @return self
     */
    public function setReason($reason = null)
    {
        $this->reason = $reason;
        return $this;
    }
    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * @param int $code
     *
     * @return self
     */
    public function setCode($code = null)
    {
        $this->code = $code;
        return $this;
    }
    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * @param string $content
     *
     * @return self
     */
    public function setContent($content = null)
    {
        $this->content = $content;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getSourceIds()
    {
        return $this->sourceIds;
    }
    /**
     * @param string[] $sourceIds
     *
     * @return self
     */
    public function setSourceIds(array $sourceIds = null)
    {
        $this->sourceIds = $sourceIds;
        return $this;
    }
}