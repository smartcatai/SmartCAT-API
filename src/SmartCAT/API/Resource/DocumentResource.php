<?php

namespace SmartCat\Client\Resource;

use SmartCat\Client\Helper\QueryParam;

class DocumentResource extends Resource
{
    /**
    * Document ID can have the form  int1 or int1_int2, <br />
               where int1 is the document ID and int2 is the target language ID of the document, <br />
               Example request: ?documentIds=61331_25'ampersand'documentIds=61332_9.<br />
    *
    * @param array  $parameters {
    *     @var array $documentIds Array of document IDs
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
        $search = [];
        for ($i = 0; $i < count($parameters['documentIds']); $i++) {
            $search[] = "documentIds%5B$i%5D";
        }
        $url = str_replace($search, 'documentIds', $url);
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
    * Document ID can have the form  int1 or int1_int2, <br />
               with int1 being the document ID and int2 being the document's target language ID.<br />
    *
    * @param array  $parameters {
    *     @var string $documentId Document ID
    * }
    * @param string $fetch      Fetch mode (object or response)
    *
    * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\DocumentModel
    */
    public function documentGet($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $url = '/api/integration/v1/document';
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\DocumentModel', 'json');
            }
        }
        return $response;
    }
    /**
    * Document ID can have the form  int1 or int1_int2, <br />
               with int1 being the document ID and int2 being the document's target language ID.<br />
    *
    * @param array  $parameters {
    *     @var string $documentId Document ID
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
     * 
     *
     * @param array  $parameters {
     *     @var string $documentId 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\ObjectModel
     */
    public function documentGetTranslationsImportResult($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $url = '/api/integration/v1/document/translate/result';
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\ObjectModel', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param array  $parameters {
     *     @var string $documentId 
     *     @var bool $onlyExactMatches 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\DocumentStatisticsModel
     */
    public function documentGetStatistics($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setDefault('onlyExactMatches', NULL);
        $url = '/api/integration/v1/document/statistics';
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\DocumentStatisticsModel', 'json');
            }
        }
        return $response;
    }
    /**
    * Document ID can have the form  int1 or int1_int2, <br />
               with int1 being the document ID and int2 being the document's target language ID.<br />
    *
    * @param array $freelancerUserIds Assignee IDs
    * @param array  $parameters {
    *     @var string $documentId Document ID
    *     @var int $stageNumber Workflow stage number
    * }
    * @param string $fetch      Fetch mode (object or response)
    *
    * @return \Psr\Http\Message\ResponseInterface
    */
    public function documentAssignFreelancersToDocument(array $freelancerUserIds, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters(['Content-Type']);
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('stageNumber');
        $url = '/api/integration/v1/document/assignFreelancers';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($freelancerUserIds, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
    * Document ID can have the form  int1 or int1_int2, <br />
               with int1 being the document ID and int2 being the document's target language ID.<br />
    			Notes to the AssignmentMode values:<br />
    			AssignmentMode.DistributeAmongAll — assign segments automatically to all selected freelancers.<br />
    			AssignmentMode.Rocket — send invitations to all selected freelancers and assign all unassigned segments to the first freelancer to accept the offer.<br />
    			AssignmentMode.InviteOnly — send invitations and assign segments manually after the freelancers accept the offer.<br />
    			Note: if the number of segments is not set, the document will be split into equal segments among the freelancers who will accept the offer.<br />
    *
    * @param \SmartCat\Client\Model\AssignExecutivesRequestModel $request Assignment request —List of assignees
    * @param array  $parameters {
    *     @var string $documentId Document ID
    *     @var int $stageNumber Workflow stage number
    * }
    * @param string $fetch      Fetch mode (object or response)
    *
    * @return \Psr\Http\Message\ResponseInterface
    */
    public function documentAssignExecutives(\SmartCat\Client\Model\AssignExecutivesRequestModel $request, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters(['Content-Type']);
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('stageNumber');
        $url = '/api/integration/v1/document/assign';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
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
     * Accepts a multipart query containing a model in JSON format (Content-Type=application/json) and one or several files (Content-Type=application/octet-stream). Swagger UI does not support mapping and execution of such queries. The parameters section contains the model description, but no parameters corresponding to the files. To send the query, use third-party utilities like cURL.
     *
     * @param \SmartCat\Client\Model\UploadDocumentPropertiesModel $updateDocumentModel
     * @param array  $parameters {
     *     @var string $documentId 
     *     @var string $disassembleAlgorithmName 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\DocumentModel[]
     */
    public function documentUpdate($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setDefault('disassembleAlgorithmName', NULL);
        $url = '/api/integration/v1/document/update';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($updateDocumentModel, 'json');
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
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
    * Document ID can have the form  int1 or int1_int2, <br />
               with int1 being the document ID and int2 being the document's target language ID.<br />
    *
    * @param array  $parameters {
    *     @var string $documentId Document ID
    *     @var string $name New name
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
    /**
     * 
     *
     * @param array  $parameters {
     *     @var string $documentId 
     *     @var  $translationFile 
     *     @var bool $overwrite 
     *     @var bool $confirmTranslation 
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
        $queryParam->setDefault('overwrite', NULL);
        $queryParam->setDefault('confirmTranslation', NULL);
        $url = '/api/integration/v1/document/translate';
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
    /**
     * The endpoint is available only for the re-import of the modified XLIFF files exported via POST /api/integration/v1/document/export. The request body can contain only one XLIFF file per request.
     *
     * @param array  $parameters {
     *     @var string $documentId ID of the document to update
     *     @var bool $confirmTranslation Confirm updated segments
     *     @var bool $overwriteUpdatedSegments Overwrite the segments that have been updated since the last export of the XLIFF file
     *     @var  $translationFile XLIFF file with updated segments
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
    /**
     * 
     *
     * @param array  $parameters {
     *     @var string $accountUserId 
     *     @var string $documentId 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentGetAuthUrl($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('accountUserId');
        $queryParam->setRequired('documentId');
        $url = '/api/integration/v1/document/getAuthUrl';
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
}