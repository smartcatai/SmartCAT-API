<?php

namespace SmartCat\Client\Model;

class CallbackPropertyModel
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var AdditionalHeaderModel[]
     */
    protected $additionalHeaders;
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
     * @return AdditionalHeaderModel[]
     */
    public function getAdditionalHeaders()
    {
        return $this->additionalHeaders;
    }
    /**
     * @param AdditionalHeaderModel[] $additionalHeaders
     *
     * @return self
     */
    public function setAdditionalHeaders(array $additionalHeaders = null)
    {
        $this->additionalHeaders = $additionalHeaders;
        return $this;
    }
}