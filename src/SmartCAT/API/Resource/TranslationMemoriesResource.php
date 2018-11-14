<?php

namespace SmartCat\Client\Resource;

use SmartCat\Client\Helper\QueryParam;

class TranslationMemoriesResource extends Resource
{
    /**
     * 
     *
     * @param string $tmId TM ID
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function translationMemoriesRemoveTranslationMemory($tmId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/translationmemory/{tmId}';
        $url = str_replace('{tmId}', urlencode($tmId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
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
     * 
     *
     * @param string $tmId TM ID
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\TranslationMemoryModel
     */
    public function translationMemoriesGetMetaInfo($tmId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/translationmemory/{tmId}';
        $url = str_replace('{tmId}', urlencode($tmId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\TranslationMemoryModel', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param string $tmId TM ID
     * @param array  $parameters {
     *     @var bool $replaceAllContent Requirement to replace the contents of the TM completely
     *     @var  $tmxFile Uploaded TMX file
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function translationMemoriesImport($tmId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('replaceAllContent');
        $queryParam->setRequired('tmxFile');
        $queryParam->setFormParameters(array('tmxFile'));
        $url = '/api/integration/v1/translationmemory/{tmId}';
        $url = str_replace('{tmId}', urlencode($tmId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
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
     *     @var string $lastProcessedId The last ID obtained from the previous request
     *     @var int $batchSize Desired size of the collection to be returned
     *     @var string $sourceLanguage optional filtering by source language
     *     @var string $targetLanguage optional filtering by target language
     *     @var string $clientId optional filtering by client
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\TranslationMemoryModel[]
     */
    public function translationMemoriesGetTranslationMemoriesBatch($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('lastProcessedId');
        $queryParam->setRequired('batchSize');
        $queryParam->setDefault('sourceLanguage', NULL);
        $queryParam->setDefault('targetLanguage', NULL);
        $queryParam->setDefault('clientId', NULL);
        $url = '/api/integration/v1/translationmemory';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\TranslationMemoryModel[]', 'json');
            }
            if ('204' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\TranslationMemoryModel[]', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param \SmartCat\Client\Model\CreateTranslationMemoryModel $model
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function translationMemoriesCreateEmptyTM(\SmartCat\Client\Model\CreateTranslationMemoryModel $model, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/translationmemory';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($model, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
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
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\TMImportTaskModel[]
     */
    public function translationMemoriesGetPendingTasks($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/translationmemory/task';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\TMImportTaskModel[]', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param string $tmId 
     * @param array  $parameters {
     *     @var bool $withTags 
     *     @var bool $tradosCompatible 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\Object
     */
    public function translationMemoriesExportFile($tmId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('withTags', NULL);
        $queryParam->setDefault('tradosCompatible', NULL);
        $url = '/api/integration/v1/translationmemory/{tmId}/file';
        $url = str_replace('{tmId}', urlencode($tmId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\Object', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param \SmartCat\Client\Model\TmMatchesRequest $request
     * @param array  $parameters {
     *     @var string $tmId 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\SegmentWithMatchesModel
     */
    public function translationMemoriesGetTMTranslations(\SmartCat\Client\Model\TmMatchesRequest $request, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('tmId');
        $url = '/api/integration/v1/translationmemory/matches';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($request, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\SegmentWithMatchesModel', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param string $tmId TM ID
     * @param array $targetLanguages Array of the required target languages
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function translationMemoriesSetTMTargetLanguages($tmId, array $targetLanguages, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/translationmemory/{tmId}/targets';
        $url = str_replace('{tmId}', urlencode($tmId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
        $body = $targetLanguages;
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
     * @param string $taskId ID of the task for import to the TM
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function translationMemoriesRemoveSpecificImportTask($taskId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/translationmemory/task/{taskId}';
        $url = str_replace('{taskId}', urlencode($taskId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('DELETE', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
}