<?php

namespace SmartCAT\API\Resource;

use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use Joli\Jane\OpenApi\Runtime\Client\Resource;
class PlaceholderFormatApiResource extends Resource
{
    /**
     * 
     *
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\PlaceholderFormatModel[]
     */
    public function placeholderFormatApiGetPlaceholderFormats($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/placeholders';
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
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCAT\\API\\Model\\PlaceholderFormatModel[]', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param \SmartCAT\API\Model\PlaceholderFormatModel[] $formats 
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function placeholderFormatApiUpdatePlaceholderFormats($formats, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters(['Content-Type']);
        $url = '/api/integration/v1/placeholders';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($formats, 'json');
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
     *     @var string $format 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function placeholderFormatApiValidatePlaceholderFormat($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('format');
        $url = '/api/integration/v1/placeholders/validate';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
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