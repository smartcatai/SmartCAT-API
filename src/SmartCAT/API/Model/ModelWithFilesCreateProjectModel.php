<?php

namespace SmartCat\Client\Model;

class ModelWithFilesCreateProjectModel
{
    /**
     * @var CreateProjectModel
     */
    protected $value;
    /**
     * @var UploadedFile[]
     */
    protected $files;
    /**
     * @return CreateProjectModel
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * @param CreateProjectModel $value
     *
     * @return self
     */
    public function setValue(CreateProjectModel $value = null)
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