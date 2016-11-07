<?php

namespace SmartCAT\API\Resource;

use Joli\Jane\OpenApi\Client\QueryParam;
use Joli\Jane\OpenApi\Client\Resource;

class DocumentResource extends Resource
{
    /**
     *
     *
     * @param array $parameters {
     * @var array $documentIds Массив идентификаторов документов
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentDelete($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentIds');
        $url = '/api/integration/v1/document';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('DELETE', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        return $response;
    }

    /**
     *
     *
     * @param array $parameters {
     * @var string $documentId Идентификатор документа
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\DocumentModel
     */
    public function documentGet($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $url = '/api/integration/v1/document';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCAT\\API\\Model\\DocumentModel', 'json');
            }
        }
        return $response;
    }

    /**
     *
     *
     * @param array $parameters {
     * @var string $documentId Идентификатор документа
     * @var  $uploadedFile Файл
     * @var string $disassembleAlgorithmName Опциональный алгоритм разбора файла.
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\DocumentModel[]
     */
    public function documentUpdate($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('uploadedFile');
        $queryParam->setFormParameters(array('uploadedFile'));
        $queryParam->setDefault('disassembleAlgorithmName', NULL);
        $url = '/api/integration/v1/document/update';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCAT\\API\\Model\\DocumentModel[]', 'json');
            }
        }
        return $response;
    }

    /**
     *
     *
     * @param array $parameters {
     * @var string $documentId Идентификатор документа
     * @var string $name Новое название
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentRename($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('name');
        $url = '/api/integration/v1/document/rename';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        return $response;
    }

    /**
     * Доступно не для всех форматов файлов, а только для тех, которые поддерживают честное обновление
     * (де-факто на данный момент это ресурсные файлы с уникальными идентификаторами ресурсов).
     * Ставит задачу в процессинге. На момент завершения запроса перевод возможно не завершён
     *
     * @param array $parameters {
     * @var string $documentId Идентификатор переводимого документа
     * @var  $translationFile Файл с переводом
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
        $url = '/api/integration/v1/document/translate';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        return $response;
    }

    /**
     *
     *
     * @param array $parameters {
     * @var string $documentId Идентификатор переводимого документа
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentGetTranslationStatus($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $url = '/api/integration/v1/document/translate/status';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        return $response;
    }

    /**
     *
     *
     * @param array $freelancerUserIds Идентификаторы назначаемых пользователей-фрилансеров.
     * @param array $parameters {
     * @var string $documentId Идентификатор переводимого документа.
     * @var int $stageNumber Номер этапа workflow.
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentAssignFreelancersToDocument(array $freelancerUserIds, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('stageNumber');
        $url = '/api/integration/v1/document/assignFreelancers';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $freelancerUserIds;
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        return $response;
    }
}