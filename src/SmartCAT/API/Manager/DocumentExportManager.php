<?php

namespace SmartCAT\API\Manager;

use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use SmartCAT\API\Resource\DocumentExportResource;


class DocumentExportManager extends DocumentExportResource
{
    //TODO: PRX-21041 АПИ Не корректно обрабатывает ожидаемые параметры, массивы в get параметрах передаются в виде documentIds[0]=389134_9&documentIds[1]=389135_9, а апи ожидает documentIds=389134_9&documentIds=389135_9
    /**
     * Идентификатор документа может иметь вид: int1 или int1_int2,<br />
    где int1 - id документа, int2 - идентификатор таргет языка документа.<br />
    Пример запроса - ?documentIds=61331_25'ampersand'documentIds=61332_9.<br />
     *
     * @param array  $parameters {
     *     @var array $documentIds Идентификаторы документов
     *     @var string $type Тип экспортируемого документа, по умолчанию {AbbyyLS.SmartCat.AppIntegrations.WebApi.ExportDocumentRequestType.Target}
     *     @var int $stageNumber Номер этапа WF при скачивании промежуточного результата (доступен только если {type} = {AbbyyLS.SmartCat.AppIntegrations.WebApi.ExportDocumentRequestType.Target})
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\ExportDocumentTaskModel
     */
    public function documentExportRequestExport($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentIds');
        $queryParam->setDefault('type', NULL);
        $queryParam->setDefault('stageNumber', NULL);
        $url = '/api/integration/v1/document/export';
        $query = $queryParam->buildQueryString($parameters);
        $qr = [];
        foreach ($parameters['documentIds'] as $documentId) {
            $qr[] = "documentIds=$documentId";
        }
        if(!empty($parameters['type'])) {
            $qr[] = "type={$parameters['type']}";
        }
        if(!empty($parameters['stageNumber'])) {
            $qr[] = "stageNumber={$parameters['stageNumber']}";
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