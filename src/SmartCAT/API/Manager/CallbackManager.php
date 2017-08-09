<?php

namespace SmartCAT\API\Manager;

use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use SmartCAT\API\Resource\CallbackResource;

class CallbackManager extends CallbackResource
{
    use SmartCATManager;

    //TODO: Нет передается Content-Type: application/json

    /**
     * @param \SmartCAT\API\Model\CallbackPropertyModel $callbackProperty настройки уведомлений
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function callbackUpdate(\SmartCAT\API\Model\CallbackPropertyModel $callbackProperty, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters(['Content-Type']);
        $url = '/api/integration/v1/callback';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($callbackProperty, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }

}