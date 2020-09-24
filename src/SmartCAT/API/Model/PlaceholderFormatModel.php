<?php

namespace SmartCat\Client\Model;

class PlaceholderFormatModel
{
    /**
     * @var string
     */
    protected $regex;
    /**
     * @return string
     */
    public function getRegex()
    {
        return $this->regex;
    }
    /**
     * @param string $regex
     *
     * @return self
     */
    public function setRegex($regex = null)
    {
        $this->regex = $regex;
        return $this;
    }
}