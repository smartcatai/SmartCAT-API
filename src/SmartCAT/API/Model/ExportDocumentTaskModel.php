<?php

namespace SmartCat\Client\Model;

class ExportDocumentTaskModel
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string[]
     */
    protected $documentIds;
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
     * @return string[]
     */
    public function getDocumentIds()
    {
        return $this->documentIds;
    }
    /**
     * @param string[] $documentIds
     *
     * @return self
     */
    public function setDocumentIds(array $documentIds = null)
    {
        $this->documentIds = $documentIds;
        return $this;
    }
}