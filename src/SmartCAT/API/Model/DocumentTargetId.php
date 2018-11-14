<?php

namespace SmartCat\Client\Model;

class DocumentTargetId
{
    /**
     * @var int
     */
    protected $documentId;
    /**
     * @var int
     */
    protected $languageId;
    /**
     * @return int
     */
    public function getDocumentId()
    {
        return $this->documentId;
    }
    /**
     * @param int $documentId
     *
     * @return self
     */
    public function setDocumentId($documentId = null)
    {
        $this->documentId = $documentId;
        return $this;
    }
    /**
     * @return int
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }
    /**
     * @param int $languageId
     *
     * @return self
     */
    public function setLanguageId($languageId = null)
    {
        $this->languageId = $languageId;
        return $this;
    }
}