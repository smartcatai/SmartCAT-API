<?php

namespace SmartCat\Client\Model;

//TODO: В ручную созданая модель

class CreateDocumentPropertyWithFilesModel extends CreateDocumentPropertyModel
{
    protected $file = [];

    /**
     * Приклепляет файл к проекту
     * string $file путь к файлу или stream
     * string $fileName имя файла
     * @param
     */

    public function attachFile($file, $fileName = null)
    {
        if (gettype($file) == 'resource') {
            $this->file = ['fileName' => $fileName, 'fileContent' => $file];
        } else {
            $this->file = ['fileName' => $fileName, 'fileContent' => fopen($file, 'r')];
        }
    }

    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return CreateDocumentPropertyModel;
     */
    public function toCreateDocumentPropertyModel()
    {
        $ret = new CreateDocumentPropertyModel();
        $methods = get_class_methods($ret);
        foreach ($methods as $method) {
            if (substr($method, 0, 3) === 'set') {
                $getMethod = 'get' . substr($method, 3);
                $ret->{$method}($this->{$getMethod}());
            }
        }
        return $ret;

    }
}