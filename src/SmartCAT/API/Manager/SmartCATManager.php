<?php

namespace SmartCAT\API\Manager;


trait SmartCATManager
{
    protected function createFormData(array $params = array(), array $files = array(), array $headers = array())
    {
        // invalid characters for "name" and "filename"
        static $disallow = array("\0", "\"", "\r", "\n");

        // build file parameters
        foreach ($files as $k => $v) {
            $contentType = "application/octet-stream";
            if (isset($v["path"])) {
                switch (true) {
                    case false === $v["path"] = realpath(filter_var($v["path"])):
                    case !is_file($v["path"]):
                    case !is_readable($v["path"]):
                        continue; // or return false, throw new InvalidArgumentException
                }
                $filename = call_user_func("end", explode(DIRECTORY_SEPARATOR, $v["path"]));
                $data = file_get_contents($v["path"]);
            } else if (isset($v["content"])) {
                $data = $v["content"];
                $filename = $v["filename"];
                if (isset($v["mime"])) $contentType = $v["mime"];
            } else {
                continue;
            }
            $k = str_replace($disallow, "_", $k);
            $filename = str_replace($disallow, "_", $filename);
            $body[] = implode("\r\n", array(
                "Content-Disposition: form-data; name=\"{$k}\"; filename=\"{$filename}\"",
                "Content-Type: $contentType",
                "",
                $data,
            ));
        }

        // build normal parameters
        foreach ($params as $k => $v) {
            $k = str_replace($disallow, "_", $k);
            $tmp = [];
            $tmp[] = "Content-Disposition: form-data; name=\"{$k}\"";
            if (isset($v['headers'])) $tmp = array_merge($tmp, $v['headers']);
            $tmp[] = "";
            $tmp[] = filter_var($v['value']);
            $body[] = implode("\r\n", $tmp);
        }


        // generate safe boundary
        do {
            $boundary = "---------------------" . md5(mt_rand() . microtime());
        } while (preg_grep("/{$boundary}/", $body));

        // add boundary for each parameters
        array_walk($body, function (&$part) use ($boundary) {
            $part = "--{$boundary}\r\n{$part}";
        });

        // add final boundary
        $body[] = "--{$boundary}--";
        $body[] = "";

        // set options
        //$headers[]="Expect: 100-continue";
        $headers["Content-Type"] = "multipart/form-data; boundary={$boundary}";
        return array('headers' => $headers, 'body' => implode("\r\n", $body));
    }
    
    public function prepareFile($fileInfo)
    {
        $pathInfo=pathinfo($fileInfo['filePath']);

        if (isset($fileInfo['filePath'])) {
            $fileInfo['fileContent'] = fopen($fileInfo['filePath'], 'r');
        }
        $fileInfo['fileName'] = $fileInfo['fileName'] ?? $pathInfo['basename'];
        return $fileInfo;
    }
}