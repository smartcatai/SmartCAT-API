<?php
/**
 * Created by PhpStorm.
 * User: Diversant_
 * Date: 24.11.2016
 * Time: 0:48
 */

namespace SmartCAT\API\Model;

//TODO: В ручную созданая модель
class TranslationMemoryMatchesTagsModel
{
    /**
     * @var int
     */
    private $position;

    /**
     * @var int
     */
    private $order;

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return self
     */
    public function setPosition(int $position)
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
     * @return self
     */
    public function setOrder(int $order)
    {
        $this->order = $order;
        return $this;
    }


}