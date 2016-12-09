<?php

namespace SmartCAT\API\Model;

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
}