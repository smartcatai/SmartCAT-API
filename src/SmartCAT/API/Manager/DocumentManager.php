<?php

namespace SmartCAT\API\Manager;

use Joli\Jane\OpenApi\Client\QueryParam;
use SmartCAT\API\Resource\DocumentResource;

class DocumentManager extends DocumentResource
{
    use SmartCATManager;

    /**
     *
     *
     * @param array $freelancerUserIds Идентификаторы назначаемых пользователей-фрилансеров.
     * @param array $parameters {
     * @var string $documentId Идентификатор переводимого документа.
     * @var int $stageNumber Номер этапа workflow.
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentAssignFreelancersToDocument(array $freelancerUserIds, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('stageNumber');
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters('Content-Type');
        $url = '/api/integration/v1/document/assignFreelancers';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = json_encode($freelancerUserIds);
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        return $response;
    }

    /**
     *
     *
     * @param array $parameters {
     * @var array $documentIds Массив идентификаторов документов
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentDelete($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentIds');
        $qr = [];
        $stack = [];
        foreach ($parameters['documentIds'] as $documentId) {
            $stack[] = "documentIds=$documentId";
            if (strlen(implode("&", $stack)) > 995) {
                $last = array_pop($stack);
                $qr[] = $stack;
                $stack = [$last];
            }
        }
        $qr[] = $stack;
        $apiUrl = '/api/integration/v1/document';
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $response = null;
        foreach ($qr as $queryParams) {
            $url = $apiUrl . ('?' . implode("&", $queryParams));
            $request = $this->messageFactory->createRequest('DELETE', $url, $headers, $body);
            $response = $this->httpClient->sendRequest($request);
            if ($response->getStatusCode() != 204) {
                return $response;
            }
        }
        return $response;
    }

    /**
     *
     *
     * @param array $parameters {
     * @var string $documentId Идентификатор документа
     * @var array $uploadedFile {
     * @var  string $fileName Имя файла
     * @var  string $filePath Путь к Файлу | blob $fileContent Содержимое файла
     *     }
     * @var string $disassembleAlgorithmName Опциональный алгоритм разбора файла.
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\DocumentModel[]
     */
    public function documentUpdate($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setDefault('disassembleAlgorithmName', NULL);
        $queryParam->setRequired('uploadedFile');
        $queryParam->setFormParameters(['uploadedFile']);
        $formParams = [];
        // build file parameters
        $files = [];
        $files['uploadedFile'] = [];
        $files['uploadedFile']['filename'] = $parameters['uploadedFile']['fileName'];
        if (isset($parameters['uploadedFile']['filePath'])) {
            $files['uploadedFile']['content'] = file_get_contents($parameters['uploadedFile']['filePath']);
        } else {
            $files['uploadedFile']['content'] = $parameters['uploadedFile']['fileContent'];
        }
        $form_data = $this->createFormData($formParams, $files, ['Accept' => 'application/json']);

        $body = $queryParam->buildFormDataString($parameters);

        $url = '/api/integration/v1/document/update';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters), $form_data['headers']);
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $form_data['body']);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCAT\\API\\Model\\DocumentModel[]', 'json');
            }
        }
        return $response;
    }

    /**
     * Доступно не для всех форматов файлов, а только для тех, которые поддерживают честное обновление
     * (де-факто на данный момент это ресурсные файлы с уникальными идентификаторами ресурсов).
     * Ставит задачу в процессинге. На момент завершения запроса перевод возможно не завершён
     *
     * @param array $parameters {
     * @var string $documentId Идентификатор переводимого документа
     * @var array $translationFile {
     * @var  string $fileName Имя файла
     * @var  string $filePath Путь к Файлу | blob $fileContent Содержимое файла
     *     }
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentTranslate($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('translationFile');
        $queryParam->setFormParameters(array('translationFile'));
        $url = '/api/integration/v1/document/translate';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $formParams = [];
        // build file parameters
        $files = [];
        $files['translationFile'] = [];
        $files['translationFile']['filename'] = $parameters['translationFile']['fileName'];
        if (isset($parameters['translationFile']['filePath'])) {
            $files['translationFile']['content'] = file_get_contents($parameters['translationFile']['filePath']);
        } else {
            $files['translationFile']['content'] = $parameters['translationFile']['fileContent'];
        }
        $form_data = $this->createFormData($formParams, $files, ['Accept' => 'application/json']);

        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters), $form_data['headers']);
        $body = $queryParam->buildFormDataString($parameters);

        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $form_data['body']);
        $response = $this->httpClient->sendRequest($request);
        return $response;
    }
}