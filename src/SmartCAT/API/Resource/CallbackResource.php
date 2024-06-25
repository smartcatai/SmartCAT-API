<?php

namespace SmartCat\Client\Resource;

use SmartCat\Client\Helper\QueryParam;

class CallbackResource extends Resource
{
    /**
     * 
     *
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function callbackDelete($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v1/callback';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = $queryParam->buildHeaders($parameters);
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('DELETE', $url, $headers, $body);
        $promise = $this->httpClient->sendAsync($request);
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
     * @return \GuzzleHttp\Promise\PromiseInterface|\SmartCat\Client\Model\CallbackPropertyModel
     */
    public function callbackGet($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v1/callback';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsync($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\CallbackPropertyModel', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param \SmartCat\Client\Model\CallbackPropertyModel $callbackProperty Notification settings
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function callbackUpdate(\SmartCat\Client\Model\CallbackPropertyModel $callbackProperty, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters(['Content-Type']);
        $url = $this->host . '/api/integration/v1/callback';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = $queryParam->buildHeaders($parameters);
        $body = $this->serializer->serialize($callbackProperty, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsync($request);
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
     *     @var int $limit Limit on the number of returned errors (no more than 100)
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface|\SmartCat\Client\Model\CallbackErrorModel[]
     */
    public function callbackGetLastErrors($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('limit', NULL);
        $url = $this->host . '/api/integration/v1/callback/lastErrors';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsync($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\CallbackErrorModel[]', 'json');
            }
        }
        return $response;
    }
}
