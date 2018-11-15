<?php

namespace SmartCat\Client\Manager;

trait SmartCatManager
{
    protected $host;

    public function setHost($host)
    {
        $this->host = $host;
    }

    protected function prepareFile($fileInfo)
    {
        if (isset($fileInfo['filePath'])) {
            $fileInfo['fileContent'] = fopen($fileInfo['filePath'], 'r');
        }
        return $fileInfo;
    }

    /**
     * Конвертирует все параметры типа bool в строку
     * @param array $params
     * @return array
     */
    protected function prepareParams(array $params)
    {
        foreach ($params as $key => $param) {
            if (gettype($param) === 'boolean') {
                $params[$key] = (string)(($param) ? 'true' : 'false');
            }
        }
        return $params;
    }
}
