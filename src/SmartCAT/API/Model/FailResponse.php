<?php

namespace SmartCAT\API\Model;

class FailResponse
{
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
}