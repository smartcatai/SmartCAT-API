<?php

namespace SmartCat\Client\Model;

class DirectoryModel
{
    /**
     * @var string
     */
    protected $type;
    /**
     * @var DirectoryItemModel[]
     */
    protected $items;
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
     * @return DirectoryItemModel[]
     */
    public function getItems()
    {
        return $this->items;
    }
    /**
     * @param DirectoryItemModel[] $items
     *
     * @return self
     */
    public function setItems(array $items = null)
    {
        $this->items = $items;
        return $this;
    }
}