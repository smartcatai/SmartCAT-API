<?php

namespace SmartCat\Client\Resource;

use SmartCat\Client\Helper\QueryParam;

class ClientResource extends Resource
{
    /**
     * 
     *
     * @param string $name client's name
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function clientCreateClient($name, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v1/client/create';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $name;
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
     * @param string $clientId 
     * @param array  $parameters {
     *     @var string $netRateId 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface|\SmartCat\Client\Model\ClientModel
     */
    public function clientSetClientNetRate($clientId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('netRateId');
        $url = $this->host . '/api/integration/v1/client/{clientId}/set';
        $url = str_replace('{clientId}', urlencode($clientId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $promise = $this->httpClient->sendAsync($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\ClientModel', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param string $clientId 
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface|\SmartCat\Client\Model\ClientModel
     */
    public function clientGetClient($clientId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v1/client/{clientId}';
        $url = str_replace('{clientId}', urlencode($clientId), $url);
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCat\\Client\\Model\\ClientModel', 'json');
            }
        }
        return $response;
    }
}
