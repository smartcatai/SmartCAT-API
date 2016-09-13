<?php

namespace SmartCAT\API\Model;


class CreateProjectWithFilesModel extends CreateProjectModel
{
    protected $files=[];

    /**
     * Приклепляет файл к проекту
     * string $filePath путь к файлу
     * string $fileName имя файла
     * @param
     */

    public function attacheFile($filePath, $fileName){
        $this->files[$fileName]=$filePath;
    }

    public function getFiles(){
        return $this->files;
    }
}