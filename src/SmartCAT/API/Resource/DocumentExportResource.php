<?php

namespace SmartCAT\API\Resource;

use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use Joli\Jane\OpenApi\Runtime\Client\Resource;
class DocumentExportResource extends Resource
{
    /**
     * 
     *
     * @param string $taskId Идентификатор задачи на экспорт
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentExportDownloadExportResult($taskId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/document/export/{taskId}';
        $url = str_replace('{taskId}', urlencode($taskId), $url);
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
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
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