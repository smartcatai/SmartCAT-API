<?php

namespace SmartCat\Client\Resource;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Http\Message\StreamFactory\GuzzleStreamFactory;
use SmartCat\Client\Helper\QueryParam;
use SmartCat\Client\Model\ProjectModel;

/**
 * @property string $host
 */
abstract class ProjectResource extends Resource
{
    /**
     * @param string $projectId Project ID
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectDelete($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/{projectId}';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
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
     * @param string $projectId Project ID
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\ProjectModel
     */
    public function projectGet($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/{projectId}';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\ProjectModel', 'json');
            }
        }
        return $response;
    }
    /**
     * @param string $projectId Project ID
     * @param \SmartCat\Client\Model\ProjectChangesModel $model Project Changes Model
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectUpdateProject($projectId, \SmartCat\Client\Model\ProjectChangesModel $model, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters(['Content-Type']);
        $url = '/api/integration/v1/project/{projectId}';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($model, 'json');
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
     * @param array  $parameters {
     *     @var string $createdByUserId 
     *     @var string $projectName 
     *     @var string $externalTag 
     *     @var array $clientIds 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\ProjectModel[]
     */
    public function projectGetAll($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('createdByUserId', NULL);
        $queryParam->setDefault('projectName', NULL);
        $queryParam->setDefault('externalTag', NULL);
        $queryParam->setDefault('clientIds', NULL);
        $url = '/api/integration/v1/project/list';
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\ProjectModel[]', 'json');
            }
        }
        return $response;
    }
    /**
     * @param string $projectId Project ID
     * @param array  $parameters {
     *     @var bool $onlyExactMatches 100 or more matches requirement
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectGetProjectStatisticsObsolete($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('onlyExactMatches', NULL);
        $url = '/api/integration/v1/project/{projectId}/statistics';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
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
     * @param string $projectId Project ID
     * @param array  $parameters {
     *     @var bool $onlyExactMatches 100 or more matches requirement
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\ProjectStatisticsModel[]
     */
    public function projectGetProjectStatistics($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('onlyExactMatches', NULL);
        $url = '/api/integration/v2/project/{projectId}/statistics';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\ProjectStatisticsModel[]', 'json');
            }
            if ('202' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\ProjectStatisticsModel[]', 'json');
            }
        }
        return $response;
    }
    /**
     * @param string $projectId project id
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\ExecutiveStatisticsModel[]
     */
    public function projectGetCompletedWorkStatistics($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/{projectId}/completedWorkStatistics';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\ExecutiveStatisticsModel[]', 'json');
            }
        }
        return $response;
    }
    /**
     * @param string $projectId Project ID
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\ProjectTranslationMemoryModel[]
     */
    public function projectGetProjectTranslationMemories($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/{projectId}/translationmemories';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\ProjectTranslationMemoryModel[]', 'json');
            }
        }
        return $response;
    }
    /**
     * @param string $projectId 
     * @param \SmartCat\Client\Model\TranslationMemoryForProjectModel[] $tmModels 
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectSetTranslationMemoriesForWholeProject($projectId, $tmModels, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/{projectId}/translationmemories';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
        $queryParam->setDefined(['onlyExactSourceLanguageMatch', 'onlyExactTargetLanguageMatch']);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($tmModels, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
     * @param string $projectId 
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\GlossaryModel[]
     */
    public function projectGetGlossaries($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/{projectId}/glossaries';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\GlossaryModel[]', 'json');
            }
        }
        return $response;
    }
    /**
     * @param string $projectId 
     * @param array $glossaryIds 
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectSetGlossaries($projectId, array $glossaryIds, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters(['Content-Type']);
        $url = '/api/integration/v1/project/{projectId}/glossaries';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($glossaryIds, 'json');
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
     * @param array  $parameters {
     *     @var string $projectId Project ID
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectCancelProject($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('projectId');
        $url = '/api/integration/v1/project/cancel';
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
     * @param array  $parameters {
     *     @var string $projectId Project ID
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectRestoreProject($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('projectId');
        $url = '/api/integration/v1/project/restore';
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
     * @param array  $parameters {
     *     @var string $projectId 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectCompleteProject($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('projectId');
        $url = '/api/integration/v1/project/complete';
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
     * Accepts a multipart query containing a model in JSON format (Content-Type=application/json) and one or several files (Content-Type=application/octet-stream).
     * Swagger UI does not support mapping and execution of such queries. The parameters section contains the model description, but no parameters corresponding to the files.
     * To send the query, use third-party utilities like cURL.
     *
     * @param \SmartCat\Client\Model\CreateProjectModel $project Project Containing Files Creation Model
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\ProjectModel
     * @throws \Exception
     */
    public function projectCreateProject(\SmartCat\Client\Model\CreateProjectModel $project, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/create';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));

        $builder = new MultipartStreamBuilder(new GuzzleStreamFactory());
        $builder->addResource('model', $this->serializer->serialize($project, 'json'), ['headers' => ['Content-Type' => 'application/json']]);
        $multipartStream = $builder->build();

        $boundary = $builder->getBoundary();
        $headers['Content-Type'] = 'multipart/form-data; boundary="' . $boundary . '"';

        $request = $this->messageFactory->createRequest('POST', $url, $headers, $multipartStream);
        $promise = $this->httpClient->sendAsyncRequest($request);

        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }

        $response = $promise->wait();

        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), ProjectModel::class, 'json');
            }
        }

        return $response;
    }

    /**
     * Accepts a multipart query containing a model in JSON format (Content-Type=application/json) and one or several files (Content-Type=application/octet-stream). Swagger UI does not support mapping and execution of such queries. The parameters section contains the model description, but no parameters corresponding to the files. To send the query, use third-party utilities like cURL.
     *
     * @param array $parameters {
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\DocumentModel[]
     * @throws \Exception
     */
    public function projectAddDocument($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('projectId');
        $queryParam->setDefault('disassembleAlgorithmName', NULL);
        $queryParam->setDefault('externalId', NULL);
        $queryParam->setDefault('metaInfo', NULL);
        $queryParam->setDefault('targetLanguages', NULL);
        $url = '/api/integration/v1/project/document';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $documentModel;
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\DocumentModel[]', 'json');
            }
        }
        return $response;
    }
    /**
     * @param array  $parameters {
     *     @var string $projectId Project ID
     *     @var string $targetLanguage Target language
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectAddLanguage($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('projectId');
        $queryParam->setRequired('targetLanguage');
        $url = '/api/integration/v1/project/language';
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
     * @param string $projectId 
     * @param \SmartCat\Client\Model\TranslationMemoriesForLanguageModel[] $tmForLanguagesModels 
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectSetProjectTranslationMemoriesByLanguages($projectId, $tmForLanguagesModels, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/{projectId}/translationmemories/bylanguages';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($tmForLanguagesModels, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
     * @param string $projectId 
     * @param array  $parameters {
     *     @var bool $onlyExactMatches 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectBuildStatistics($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('onlyExactMatches', NULL);
        $url = '/api/integration/v1/project/{projectId}/statistics/build';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
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
     * @param string $projectId Project ID
     * @param array  $parameters {
     *     @var string $groupName Name of the assigned group
     *     @var string $workflowStage Workflow stage to assign the group to
     *     @var string $targetLanguage Target language. Optional for single-language projects
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectAssignGroupToWorkflowStage($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('groupName');
        $queryParam->setRequired('workflowStage');
        $queryParam->setDefault('targetLanguage', NULL);
        $url = '/api/integration/v1/project/{projectId}/assignGroupToWorkflowStage';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
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