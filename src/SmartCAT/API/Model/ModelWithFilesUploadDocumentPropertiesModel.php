<?php

namespace SmartCat\Client\Model;

class ModelWithFilesUploadDocumentPropertiesModel
{
    /**
     * @var UploadDocumentPropertiesModel
     */
    protected $value;
    /**
     * @var UploadedFile[]
     */
    protected $files;
    /**
     * @return UploadDocumentPropertiesModel
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * @param UploadDocumentPropertiesModel $value
     *
     * @return self
     */
    public function setValue(UploadDocumentPropertiesModel $value = null)
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