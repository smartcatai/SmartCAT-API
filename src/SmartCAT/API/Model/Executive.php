<?php

namespace SmartCat\Client\Model;

class Executive
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var int
     */
    protected $wordsCount;
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
    /**
     * @return int
     */
    public function getWordsCount()
    {
        return $this->wordsCount;
    }
    /**
     * @param int $wordsCount
     *
     * @return self
     */
    public function setWordsCount($wordsCount = null)
    {
        $this->wordsCount = $wordsCount;
        return $this;
    }
}