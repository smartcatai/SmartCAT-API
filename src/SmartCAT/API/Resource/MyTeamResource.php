<?php

namespace SmartCat\Client\Resource;

use SmartCat\Client\Helper\QueryParam;
use SmartCat\Client\Model\InhouseTranslatorModel;

/**
 * @property string $host
 */
class MyTeamResource extends Resource
{
    public function createInhouseTranslator(
        InhouseTranslatorModel $model,
        $parameters = array(),
        $fetch = self::FETCH_OBJECT
    ) {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v1/account/myTeam';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($model, 'json');
        $body = str_replace('"{', '{', $body);
        $body = str_replace('}"', '}', $body);
        $body = str_replace('\"', '"', $body);
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsync($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                $body = (string) $response->getBody();
                return json_decode($body);
            }
        }
        return $response;

    }
}
