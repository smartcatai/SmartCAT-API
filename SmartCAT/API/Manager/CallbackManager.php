<?php

namespace SmartCAT\API\Manager;
use SmartCAT\API\Resource\CallbackResource;
use Joli\Jane\OpenApi\Client\QueryParam;
use Joli\Jane\OpenApi\Client\Resource;

class CallbackManager extends CallbackResource
{
    /**
     *
     *
     * @param \SmartCAT\API\Model\CallbackPropertyModel $callbackProperty настройки уведомлений
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\Object
     */
    public function callbackUpdate(\SmartCAT\API\Model\CallbackPropertyModel $callbackProperty, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('Content-Type','application/json');
        $queryParam->setHeaderParameters(['Content-Type']);
        $url = '/api/integration/v1/callback';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($callbackProperty, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                //TODO: Нет модели ответа
                //return $this->serializer->deserialize((string) $response->getBody(), 'SmartCAT\\API\\Model\\Object', 'json');
            }
        }
        return $response;
    }

    /**
     *
     *
     * @param array  $parameters {
     *     @var int $limit
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\Object
     */
    public function callbackGetLastErrors($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('limit', NULL);
        $url = '/api/integration/v1/callback/lastErrors';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                //TODO: Нет модели ответа
                //return $this->serializer->deserialize((string) $response->getBody(), 'SmartCAT\\API\\Model\\Object', 'json');
            }
        }
        return $response;
    }
}