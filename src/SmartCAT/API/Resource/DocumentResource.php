<?php

namespace SmartCAT\API\Resource;

use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use Joli\Jane\OpenApi\Runtime\Client\Resource;
class DocumentResource extends Resource
{
    /**
    * Идентификатор документа может иметь вид: int1 или int1_int2,<br />
               где int1 - id документа, int2 - идентификатор таргет языка документа,<br />
               пример запроса - ?documentIds=61331_25'ampersand'documentIds=61332_9.<br />
    *
    * @param array  $parameters {
    *     @var array $documentIds Массив идентификаторов документов
    * }
    * @param string $fetch      Fetch mode (object or response)
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
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
    * Идентификатор документа может иметь вид: int1 или int1_int2,<br />
               где int1 - id документа, int2 - идентификатор таргет языка документа.<br />
    *
    * @param array  $parameters {
    *     @var string $documentId Идентификатор документа
    * }
    * @param string $fetch      Fetch mode (object or response)
    *
    * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\DocumentModel
    */
    public function documentGet($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $url = '/api/integration/v1/document';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai', 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCAT\\API\\Model\\DocumentModel', 'json');
            }
        }
        return $response;
    }
    /**
    * Идентификатор документа может иметь вид: int1 или int1_int2,<br />
               где int1 - id документа, int2 - идентификатор таргет языка документа.<br />
    *
    * @param array  $parameters {
    *     @var string $documentId Идентификатор документа
    * }
    * @param string $fetch      Fetch mode (object or response)
    *
    * @return \Psr\Http\Message\ResponseInterface
    */
    public function documentGetTranslationStatus($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $url = '/api/integration/v1/document/translate/status';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai', 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
    * Идентификатор документа может иметь вид: int1 или int1_int2,<br />
               где int1 - id документа, int2 - идентификатор таргет языка документа.<br />
    *
    * @param array $freelancerUserIds Идентификаторы назначаемых пользователей-фрилансеров
    * @param array  $parameters {
    *     @var string $documentId Идентификатор документа
    *     @var int $stageNumber Номер этапа workflow
    * }
    * @param string $fetch      Fetch mode (object or response)
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
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
    * Идентификатор документа может иметь вид: int1 или int1_int2,<br />
               где int1 - id документа, int2 - идентификатор таргет языка документа.<br />
    *
    * @param \SmartCAT\API\Model\AssignExecutivesRequestModel $request Запрос для назначения - список назначаемых исполнителей
    * @param array  $parameters {
    *     @var string $documentId Идентификатор документа
    *     @var int $stageNumber Номер этапа workflow
    * }
    * @param string $fetch      Fetch mode (object or response)
    *
    * @return \Psr\Http\Message\ResponseInterface
    */
    public function documentAssignExecutives(\SmartCAT\API\Model\AssignExecutivesRequestModel $request, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('stageNumber');
        $url = '/api/integration/v1/document/assign';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($request, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
    * Идентификатор документа может иметь вид: int1 или int1_int2,<br />
               где int1 - id документа, int2 - идентификатор таргет языка документа.<br />
    *
    * @param array  $parameters {
    *     @var string $documentId Идентификатор документа
    *     @var  $uploadedFile Файл
    *     @var string $disassembleAlgorithmName Опциональный алгоритм разбора файла
    * }
    * @param string $fetch      Fetch mode (object or response)
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
        $headers = array_merge(array('Host' => 'smartcat.ai', 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCAT\\API\\Model\\DocumentModel[]', 'json');
            }
        }
        return $response;
    }
    /**
    * Идентификатор документа может иметь вид: int1 или int1_int2,<br />
               где int1 - id документа, int2 - идентификатор таргет языка документа.<br />
    *
    * @param array  $parameters {
    *     @var string $documentId Идентификатор документа
    *     @var string $name Новое название
    * }
    * @param string $fetch      Fetch mode (object or response)
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
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
    * Доступно не для всех форматов файлов, а только для тех, которые поддерживают честное обновление<br />
               (де-факто на данный момент это ресурсные файлы с уникальными идентификаторами ресурсов).<br />
               Ставит задачу в процессинге, на момент завершения запроса перевод возможно не завершён.<br /><br />
               Идентификатор документа может иметь вид: int1 или int1_int2,<br />
               где int1 - id документа, int2 - идентификатор таргет языка документа.<br />
    *
    * @param array  $parameters {
    *     @var string $documentId Идентификатор документа
    *     @var  $translationFile Файл с переводом
    * }
    * @param string $fetch      Fetch mode (object or response)
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
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
     * 
     *
     * @param array  $parameters {
     *     @var string $documentId Идентификатор обновляемого документа
     *     @var bool $confirmTranslation Подтверждать переводы
     *     @var bool $overwriteUpdatedSegments Обновлять ли переводы в сегментах, которые успели измениться с момента выгрузки xliff файла
     *     @var  $translationFile Xliff файл с переводами сегментов
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentTranslateWithXliff($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('confirmTranslation');
        $queryParam->setRequired('overwriteUpdatedSegments');
        $queryParam->setRequired('translationFile');
        $queryParam->setFormParameters(array('translationFile'));
        $url = '/api/integration/v1/document/translateWithXliff';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
}