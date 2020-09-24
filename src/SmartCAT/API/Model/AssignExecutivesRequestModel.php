<?php

namespace SmartCat\Client\Model;

class AssignExecutivesRequestModel
{
    /**
     * @var Executive[]
     */
    protected $executives;
    /**
     * @var int
     */
    protected $minWordsCountForExecutive;
    /**
     * @var string
     */
    protected $assignmentMode;
    /**
     * @return Executive[]
     */
    public function getExecutives()
    {
        return $this->executives;
    }
    /**
     * @param Executive[] $executives
     *
     * @return self
     */
    public function setExecutives(array $executives = null)
    {
        $this->executives = $executives;
        return $this;
    }
    /**
     * @return int
     */
    public function getMinWordsCountForExecutive()
    {
        return $this->minWordsCountForExecutive;
    }
    /**
     * @param int $minWordsCountForExecutive
     *
     * @return self
     */
    public function setMinWordsCountForExecutive($minWordsCountForExecutive = null)
    {
        $this->minWordsCountForExecutive = $minWordsCountForExecutive;
        return $this;
    }
    /**
     * @return string
     */
    public function getAssignmentMode()
    {
        return $this->assignmentMode;
    }
    /**
     * @param string $assignmentMode
     *
     * @return self
     */
    public function setAssignmentMode($assignmentMode = null)
    {
        $this->assignmentMode = $assignmentMode;
        return $this;
    }
}