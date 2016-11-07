<?php

namespace SmartCAT\API\Manager;

use Joli\Jane\OpenApi\Client\QueryParam;
use SmartCAT\API\Resource\DocumentExportResource;


class DocumentExportManager extends DocumentExportResource
{
    /**
     *
     *
     * @param array $parameters {
     * @var array $documentIds Идентификаторы документов
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\ExportDocumentTaskModel
     */
    public function documentExportRequestExport($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentIds');
        $url = '/api/integration/v1/document/export';
        $queryParam->buildQueryString($parameters);
        $qr = [];
        foreach ($parameters['documentIds'] as $documentId) {
            $qr[] = "documentIds=$documentId";
        }
        $url = $url . ('?' . implode("&", $qr));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCAT\\API\\Model\\ExportDocumentTaskModel', 'json');
            }
        }
        return $response;
    }

}