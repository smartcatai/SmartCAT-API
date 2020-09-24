<?php

namespace SmartCat\Client\Model;

class TagsFromUnit
{
    /**
     * @var int
     */
    protected $position;
    /**
     * @var int
     */
    protected $order;
    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }
    /**
     * @param int $position
     *
     * @return self
     */
    public function setPosition($position = null)
    {
        $this->position = $position;
        return $this;
    }
    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }
    /**
     * @param int $order
     *
     * @return self
     */
    public function setOrder($order = null)
    {
        $this->order = $order;
        return $this;
    }
}