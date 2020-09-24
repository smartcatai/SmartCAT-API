<?php

namespace SmartCat\Client\Model;

class DisassembleSettingsModel
{
    /**
     * @var array
     */
    protected $translatableAttributes;

    /**
     * @return array
     */
    public function getTranslatableAttributes()
    {
        return $this->translatableAttributes;
    }
    /**
     * @param array $translatableAttributes
     *  format: ['htmlTagName'=>['data-attr1', 'data-attr2']]
     *
     * @return self
     */
    public function setTranslatableAttributes($translatableAttributes = null)
    {
        $this->translatableAttributes = $translatableAttributes;
        return $this;
    }
}
