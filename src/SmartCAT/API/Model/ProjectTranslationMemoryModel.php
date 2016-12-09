<?php

namespace SmartCAT\API\Model;

class ProjectTranslationMemoryModel
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
}