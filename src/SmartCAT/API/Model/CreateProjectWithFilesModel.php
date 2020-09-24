<?php

namespace SmartCat\Client\Model;

//TODO: В ручную созданая модель

class CreateProjectWithFilesModel extends CreateProjectModel
{
    protected $files = [];

    /**
     * Приклепляет файл к проекту
     * string $file путь к файлу или stream
     * string $fileName имя файла
     * @param
     */

    public function attachFile($file, $fileName = null)
    {
        if (gettype($file) == 'resource') {
            $this->files[] = ['fileName' => $fileName, 'fileContent' => $file];
        } else {
            $this->files[] = ['fileName' => $fileName, 'fileContent' => fopen($file, 'r')];
        }
    }

    public function attacheFile($file, $fileName = null)
    {
        $this->attachFile($file, $fileName);
    }

    public function getFiles()
    {
        return $this->files;
    }
}