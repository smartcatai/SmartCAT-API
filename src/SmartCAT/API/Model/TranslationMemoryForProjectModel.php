<?php

namespace SmartCat\Client\Model;

class TranslationMemoryForProjectModel
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var int
     */
    protected $matchThreshold;
    /**
     * @var bool
     */
    protected $isWritable;
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
     * @return int
     */
    public function getMatchThreshold()
    {
        return $this->matchThreshold;
    }
    /**
     * @param int $matchThreshold
     *
     * @return self
     */
    public function setMatchThreshold($matchThreshold = null)
    {
        $this->matchThreshold = $matchThreshold;
        return $this;
    }
    /**
     * @return bool
     */
    public function getIsWritable()
    {
        return $this->isWritable;
    }
    /**
     * @param bool $isWritable
     *
     * @return self
     */
    public function setIsWritable($isWritable = null)
    {
        $this->isWritable = $isWritable;
        return $this;
    }
}