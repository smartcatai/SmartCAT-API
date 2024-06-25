<?php

namespace SmartCat\Client\Resource;

use SmartCat\Client\Helper\QueryParam;

/**
 * @property string $host
 */
class InvoiceResource extends Resource
{
    /**
     *
     *
     * @param \SmartCat\Client\Model\ImportJobModel $model
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function invoiceImportJob(\SmartCat\Client\Model\ImportJobModel $model, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v1/invoice/job';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($model, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsync($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }

    /**
     * @param \SmartCat\Client\Model\ImportJobModelV2 $model
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|string|string[]
     * @throws \Exception
     */
    public function invoiceImportJobV2(\SmartCat\Client\Model\ImportJobModelV2 $model, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v2/invoice/job';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($model, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsync($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                $body = (string) $response->getBody();
                $body = str_replace('"', '', $body);
                return $body;
            }
        }
        return $response;
    }

    /**
     * @param \SmartCat\Client\Model\CreateInvoiceModel $model
     * @param array $parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|string|string[]
     * @throws \Exception
     */
    public function createInvoice(\SmartCat\Client\Model\CreateInvoiceModel $model, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v1/invoice';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Accept' => array('application/json'), 'Content-Type' => 'application/json'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($model, 'json');
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

    /**
     * @param $externalIds
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|string|string[]
     * @throws \Exception
     */
    public function jobListByExternalId($externalIds, $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v2/invoice/job/listByExternalId';
        if (is_array($externalIds)) {
            $params = [];
            foreach ($externalIds as $externalId) {
                array_push($params, 'externalIds=' . $externalId);
            }
            $url = $url . '?' . join('&', $params);
        } else {
            $url = $url . '?externalIds=' . $externalIds;
        }
        $headers = array_merge(array('Accept' => array('application/json'), 'Content-Type' => 'application/json'));
        $request = $this->messageFactory->createRequest('GET', $url, $headers);
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

    /**
     * @param $dateCreatedFrom
     * @param $dateCreatedTo
     * @param int $limit
     * @param int $skip
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|string|string[]
     * @throws \Exception
     */
    public function getInvoiceList(\DateTime $dateCreatedFrom, \DateTime $dateCreatedTo, $limit = 10, $skip = 0, $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v2/invoice/list';
        $url = $url . '?dateCreatedFrom=' . $dateCreatedFrom->format('Y-m-d H:i:s');
        $url = $url . '&dateCreatedTo=' . $dateCreatedTo->format('Y-m-d H:i:s');
        $url = $url . '&limit=' . $limit;
        $url = $url . '&skip=' . $skip;

        $headers = array_merge(array('Accept' => array('application/json'), 'Content-Type' => 'application/json'));
        $request = $this->messageFactory->createRequest('GET', $url, $headers);
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
