<?php

namespace SmartCat\Client\Model;

class ModelWithFilesIReadOnlyListCreateDocumentPropertyModel
{
    /**
     * @var CreateDocumentPropertyModel[]
     */
    protected $value;
    /**
     * @var UploadedFile[]
     */
    protected $files;
    /**
     * @return CreateDocumentPropertyModel[]
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * @param CreateDocumentPropertyModel[] $value
     *
     * @return self
     */
    public function setValue(array $value = null)
    {
        $this->value = $value;
        return $this;
    }
    /**
     * @return UploadedFile[]
     */
    public function getFiles()
    {
        return $this->files;
    }
    /**
     * @param UploadedFile[] $files
     *
     * @return self
     */
    public function setFiles(array $files = null)
    {
        $this->files = $files;
        return $this;
    }
}