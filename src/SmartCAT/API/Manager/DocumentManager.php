<?php

namespace SmartCat\Client\Manager;

use GuzzleHttp\Psr7\MultipartStream;
use SmartCat\Client\Helper\QueryParam;
use SmartCat\Client\Resource\DocumentResource;

class DocumentManager extends DocumentResource
{
    use SmartCatManager;

    //TODO: Обертка для обработка слишком большого кол-ва ид для удаления

    /**
     * @param array $parameters {
     * @var array $documentIds Массив идентификаторов документов
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface | \Psr\Http\Message\ResponseInterface[]
     */
    public function documentDelete($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentIds');
        $qr = [];
        $stack = [];
        $parametersStack = [];
        foreach ($parameters['documentIds'] as $documentId) {
            $qr[] = "documentIds=$documentId";
            $parametersStack[] = $documentId;
            if (strlen(implode("&", $qr)) > 995) {
                $last = array_pop($qr);
                $qr = [$last];
                $lastParam = array_pop($parametersStack);
                $stack[] = $parametersStack;
                $parametersStack = [$lastParam];
            }
        }

        $stack[] = $parametersStack;
        $responses = [];
        $response = null;
        foreach ($stack as $params) {
            $response = parent::documentDelete(['documentIds' => $params], $fetch);
            if (self::FETCH_PROMISE === $fetch) {
                $responses[] = $response;
            }
            if ($response->getStatusCode() != 204) {
                return $response;
            }
        }
        if (self::FETCH_PROMISE === $fetch) {
            return $responses;
        }
        return $response;
    }

    //TODO: Генератор не умет работать с файлами

    /**
     * @param array $parameters {
     * @var string $documentId Идентификатор документа
     * @var \SmartCat\Client\Model\UploadDocumentPropertiesModel $updateDocumentModel Модель обновления документа с файлом
     * @var array $uploadedFile {
     * @var string $fileName - optional
     * @var string $filePath | blob or stream $fileContent
     *     }
     * @var string $disassembleAlgorithmName Опциональный алгоритм разбора файла.
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\DocumentModel[]
     */
    public function documentUpdate($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $updateDocumentModel = isset($parameters['updateDocumentModel']) ? $parameters['updateDocumentModel'] : null;
        if ($updateDocumentModel) {
            unset($parameters['updateDocumentModel']);
        }
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('uploadedFile');
        $queryParam->setFormParameters(array('uploadedFile'));
        $queryParam->setDefault('disassembleAlgorithmName', NULL);
        $headers = array_merge(array('Accept' => array('application/json')), $queryParam->buildHeaders($parameters));

        $parameters['uploadedFile'] = $this->prepareFile($parameters['uploadedFile']);

        $body = [];
        $body[] = [
            'name' => 'uploadedFile',
            'contents' =>  $parameters['uploadedFile']['fileContent'],
            'filename' => isset($parameters['uploadedFile']['fileName']) ? $this->prepareFileName($parameters['uploadedFile']['fileName']) : null,
            'headers' => ['Content-Type' => "application/octet-stream"]
        ];
        if ($updateDocumentModel) {
            $body[] = [
                'name' => 'updateDocumentModel',
                'contents' => json_encode($updateDocumentModel),
                'headers' => ['Content-Type' => 'application/json']
            ];
        }
        $stream = new MultipartStream($body);
        $headers['Content-Type'] = 'multipart/form-data; boundary=' . $stream->getBoundary();

        $url = $this->host . '/api/integration/v1/document/update';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $stream);
        $promise = $this->httpClient->sendAsync($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCat\\Client\\Model\\DocumentModel[]', 'json');
            }
        }
        return $response;
    }

    private function prepareFileName($fileName)
    {
        return preg_replace('/[\<\>\|\:\*\?]/', '_', $fileName);
    }

    //TODO: Генератор не умет работать с файлами

    /**
     * Доступно не для всех форматов файлов, а только для тех, которые поддерживают честное обновление
     * (де-факто на данный момент это ресурсные файлы с уникальными идентификаторами ресурсов).
     * Ставит задачу в процессинге. На момент завершения запроса перевод возможно не завершён
     *
     * @param array $parameters {
     * @var string $documentId Идентификатор переводимого документа
     * @var array $translationFile {
     * @var string $fileName - optional
     * @var string $filePath | blob or stream $fileContent
     *     }
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentTranslate($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('translationFile');
        $queryParam->setFormParameters(array('translationFile'));
        $headers = $queryParam->buildHeaders($parameters);

        $parameters['translationFile'] = $this->prepareFile($parameters['translationFile']);

        $body = [];
        $body[] = [
            'name' => 'translationFile',
            'contents' => $parameters['translationFile']['fileContent'],
            'filename' => $parameters['translationFile']['fileName'] ?? null,
            'headers' => ['Content-Type' => "application/octet-stream"]
        ];
        $multipartStream = new MultipartStream($body);
        $boundary = $multipartStream->getBoundary();
        $headers['Content-Type'] = 'multipart/form-data; boundary=' . $boundary;

        $url = $this->host . '/api/integration/v1/document/translate';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));

        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $multipartStream);
        $promise = $this->httpClient->sendAsync($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }

    //TODO: Генератор не умет работать с файлами
    //TODO: Не правильное описание метода PRX-23102
    /**
     * Метод доступен только для возврата модифицированных XLIFF-файлов, экспортированных с помощью метода POST /api/integration/v1/document/export. Тело запроса может содержать только один XLIFF-файл.
     *
     * @param array $parameters {
     * @var string $documentId Идентификатор обновляемого документа
     * @var bool $confirmTranslation Подтверждать переводы
     * @var bool $overwriteUpdatedSegments Обновлять ли переводы в сегментах, которые успели измениться с момента выгрузки xliff файла
     * @var array $translationFile Xliff файл с переводами сегментов{
     * @var string $fileName - optional
     * @var string $filePath | blob or stream $fileContent
     *     }
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentTranslateWithXliff($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $parameters = $this->prepareParams($parameters);
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('confirmTranslation');
        $queryParam->setRequired('overwriteUpdatedSegments');
        $queryParam->setRequired('translationFile');
        $queryParam->setFormParameters(['translationFile']);
        $headers = $queryParam->buildHeaders($parameters);

        $parameters['translationFile'] = $this->prepareFile($parameters['translationFile']);

        $body = [];
        $body[] = [
            'name' => 'translationFile',
            'contents' => $parameters['translationFile']['fileContent'],
            'filename' => $parameters['translationFile']['fileName'] ?? null,
            'headers' => ['Content-Type' => "application/octet-stream"]
        ];
        $multipartStream = new MultipartStream($body);
        $boundary = $multipartStream->getBoundary();
        $headers['Content-Type'] = 'multipart/form-data; boundary=' . $boundary;
        $body = $multipartStream->getContents();

        $url = $this->host . '/api/integration/v1/document/translateWithXliff';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $promise = $this->httpClient->sendAsync($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
}
