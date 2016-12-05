<?php

namespace SmartCAT\API\Manager;

use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use SmartCAT\API\Resource\DocumentExportResource;


class DocumentExportManager extends DocumentExportResource
{
    //TODO: PRX-21041 АПИ Не корректно обрабатывает ожидаемые параметры, массивы в get параметрах передаются в виде documentIds[0]=389134_9&documentIds[1]=389135_9, а апи ожидает documentIds=389134_9&documentIds=389135_9
    /**
     * @param array  $parameters {
     *     @var array $documentIds Идентификаторы документов
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\ExportDocumentTaskModel
     */
    public function documentExportRequestExport($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentIds');
        $url = '/api/integration/v1/document/export';
        $query = $queryParam->buildQueryString($parameters);

        $qr = [];
        foreach ($parameters['documentIds'] as $documentId) {
            $qr[] = "documentIds=$documentId";
        }
        $url = $url . ('?' . implode("&", $qr));

        $headers = array_merge(array('Host' => 'smartcat.ai', 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCAT\\API\\Model\\ExportDocumentTaskModel', 'json');
            }
        }
        return $response;
    }
}