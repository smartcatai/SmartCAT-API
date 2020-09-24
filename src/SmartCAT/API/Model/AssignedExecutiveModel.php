<?php

namespace SmartCat\Client\Model;

class AssignedExecutiveModel
{
    /**
     * @var int
     */
    protected $assignedWordsCount;
    /**
     * @var float
     */
    protected $progress;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $type;
    /**
     * @return int
     */
    public function getAssignedWordsCount()
    {
        return $this->assignedWordsCount;
    }
    /**
     * @param int $assignedWordsCount
     *
     * @return self
     */
    public function setAssignedWordsCount($assignedWordsCount = null)
    {
        $this->assignedWordsCount = $assignedWordsCount;
        return $this;
    }
    /**
     * @return float
     */
    public function getProgress()
    {
        return $this->progress;
    }
    /**
     * @param float $progress
     *
     * @return self
     */
    public function setProgress($progress = null)
    {
        $this->progress = $progress;
        return $this;
    }
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param string $type
     *
     * @return self
     */
    public function setType($type = null)
    {
        $this->type = $type;
        return $this;
    }
}