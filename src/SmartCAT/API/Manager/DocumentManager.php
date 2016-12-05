<?php

namespace SmartCAT\API\Manager;

use Http\Discovery\StreamFactoryDiscovery;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use SmartCAT\API\Resource\DocumentResource;

class DocumentManager extends DocumentResource
{
    use SmartCATManager;


    //TODO: Нет передается Content-Type: application/json
    //TODO: не правильная документация в swagger на самом деле ожидается json string, а в параметрах написано Array[string]
    /**
     * @deprecated old capability method, use documentAssignExecutives
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
        $body = $this->serializer->serialize($freelancerUserIds, 'json');;
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }

    //TODO: PRX-21018 АПИ Не корректно обрабатывает ожидаемые параметры, массивы в get параметрах передаются в виде documentIds[0]=389134_9&documentIds[1]=389135_9, а апи ожидает documentIds=389134_9&documentIds=389135_9
    /**
     * @param array $parameters {
     * @var array $documentIds Массив идентификаторов документов
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function documentDeleteRequest($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentIds');
        $url = '/api/integration/v1/document';
        $query = $queryParam->buildQueryString($parameters);

        $qr = [];
        foreach ($parameters['documentIds'] as $documentId) {
            $qr[] = "documentIds=$documentId";
        }
        $url = $url . ('?' . implode("&", $qr));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('DELETE', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }

    //TODO: Обертка для обработка слишком большого кол-ва ид для удаления
    /**
     * @param array $parameters {
     * @var array $documentIds Массив идентификаторов документов
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface | \Psr\Http\Message\ResponseInterface[]
     */
    public function documentDelete($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentIds');
        $qr = [];
        $stack = [];
        $parametersStack = [];
        foreach ($parameters['documentIds'] as $documentId) {
            $qr[] = "documentIds=$documentId";
            $parametersStack[] = $documentId;
            if (strlen(implode("&", $qr)) > 995) {
                $last = array_pop($qr);
                $qr = [$last];
                $lastParam = array_pop($parametersStack);
                $stack[] = $parametersStack;
                $parametersStack = [$lastParam];
            }
        }

        $stack[] = $parametersStack;
        $responses = [];
        $response = null;
        foreach ($stack as $params) {
            $response = $this->documentDeleteRequest(['documentIds' => $params], $fetch);
            if (self::FETCH_PROMISE === $fetch) {
                $responses[] = $response;
            }
            if ($response->getStatusCode() != 204) {
                return $response;
            }
        }
        if (self::FETCH_PROMISE === $fetch) {
            return $responses;
        }
        return $response;
    }

    //TODO: Генератор не умет работать с файлами
    /**
     * @param array  $parameters {
     *     @var string $documentId Идентификатор документа
     *     @var array $uploadedFile {
     *          @var string $fileName - optional
     *          @var string $filePath | blob $fileContent
     *     }
     *     @var string $disassembleAlgorithmName Опциональный алгоритм разбора файла.
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\DocumentModel[]
     */
    public function documentUpdate($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('uploadedFile');
        $queryParam->setFormParameters(array('uploadedFile'));
        $queryParam->setDefault('disassembleAlgorithmName', NULL);
        $body = $queryParam->buildFormDataString($parameters);
        $headers = array_merge(array('Host' => 'smartcat.ai', 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));

        $parameters['uploadedFile'] = $this->prepareFile($parameters['uploadedFile']);

        $streamFactory = StreamFactoryDiscovery::find();
        $builder = new MultipartStreamBuilder($streamFactory);
        $builder
            ->addResource('uploadedFile', $parameters['uploadedFile']['fileContent'], ['filename' => $parameters['uploadedFile']['fileName'], 'headers' => ['Content-Type' => "application/octet-stream"]]);
        $multipartStream = $builder->build();
        $boundary = $builder->getBoundary();
        $headers['Content-Type'] = 'multipart/form-data; boundary='.$boundary;
        $body = $multipartStream->getContents();

        $url = '/api/integration/v1/document/update';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCAT\\API\\Model\\DocumentModel[]', 'json');
            }
        }
        return $response;
    }

    //TODO: Генератор не умет работать с файлами
    /**
     * Доступно не для всех форматов файлов, а только для тех, которые поддерживают честное обновление
    (де-факто на данный момент это ресурсные файлы с уникальными идентификаторами ресурсов).
    Ставит задачу в процессинге. На момент завершения запроса перевод возможно не завершён
     *
     * @param array  $parameters {
     *     @var string $documentId Идентификатор переводимого документа
     *     @var array $translationFile {
     *         @var string $fileName - optional
     *         @var string $filePath | blob $fileContent
     *     }
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentTranslate($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('translationFile');
        $queryParam->setFormParameters(array('translationFile'));
        $body = $queryParam->buildFormDataString($parameters);
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));

        $parameters['translationFile'] = $this->prepareFile($parameters['translationFile']);

        $streamFactory = StreamFactoryDiscovery::find();
        $builder = new MultipartStreamBuilder($streamFactory);
        $builder
            ->addResource('translationFile', $parameters['translationFile']['fileContent'], ['filename' => $parameters['translationFile']['fileName'], 'headers' => ['Content-Type' => "application/octet-stream"]]);
        $multipartStream = $builder->build();
        $boundary = $builder->getBoundary();
        $headers['Content-Type'] = 'multipart/form-data; boundary='.$boundary;
        $body = $multipartStream->getContents();

        $url = '/api/integration/v1/document/translate';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));

        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }

    //TODO: Нет передается Content-Type: application/json
    /**
     * @param \SmartCAT\API\Model\AssignExecutivesRequestModel $request Запрос для назначения - список назначаемых исполнителей.
     * @param array  $parameters {
     *     @var string $documentId Идентификатор переводимого документа.
     *     @var int $stageNumber Номер этапа workflow.
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentAssignExecutives(\SmartCAT\API\Model\AssignExecutivesRequestModel $request, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentId');
        $queryParam->setRequired('stageNumber');
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters('Content-Type');
        $url = '/api/integration/v1/document/assign';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($request, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
}