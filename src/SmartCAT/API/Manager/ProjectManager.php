<?php

namespace SmartCat\Client\Manager;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Http\Message\StreamFactory\GuzzleStreamFactory;
use SmartCat\Client\Helper\QueryParam;
use SmartCat\Client\Model\CreateDocumentPropertyWithFilesModel;
use SmartCat\Client\Model\ProjectModel;
use SmartCat\Client\Resource\ProjectResource;

class ProjectManager extends ProjectResource
{
    use SmartCatManager;

    //TODO: Генератор не умет работать с файлами и multipart-запросами

    /**
     * Создать проект, генерирует multipart-запрос, содержащий модель в формате JSON (Content-Type=application/json) и один или несколько файлов (Content-Type=application/octet-stream).
     * @param \SmartCat\Client\Model\CreateProjectWithFilesModel $project Модель создания проекта с файлами
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\ProjectModel
     */
    public function projectCreateProjectWithFiles(\SmartCat\Client\Model\CreateProjectWithFilesModel $project, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/create';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Host' => $this->host], $queryParam->buildHeaders($parameters));

        $builder = new MultipartStreamBuilder(new GuzzleStreamFactory());
        $builder
            ->addResource('model', $this->serializer->serialize($project, 'json'), ['headers' => ['Content-Type' => 'application/json']]);
        $projectFiles = $project->getFiles();
        $i = 0;
        foreach ($projectFiles as $fileName => $file) {
            $i++;
            $builder
                ->addResource(
                    'file_' . $i,
                    $file['fileContent'],
                    [
                        'filename' => isset($file['fileName']) ? $file['fileName'] : null,
                        'headers' => ['Content-Type' => "application/octet-stream"]
                    ]
                );
        }

        $multipartStream = $builder->build();
        $boundary = $builder->getBoundary();
        $headers['Content-Type'] = 'multipart/form-data; boundary="' . $boundary . '"';

        $request = $this->messageFactory->createRequest('POST', $url, $headers, $multipartStream);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string)$response->getBody(), ProjectModel::class, 'json');
            }
        }
        return $response;
    }

    //TODO: Генератор не умет работать с файлами и multipart-запросами

    /**
     * Принимает multipart-запрос, содержащий модель в формате JSON (Content-Type=application/json) и один или несколько файлов (Content-Type=application/octet-stream). Swagger UI не поддерживает отображение и выполение таких запросов. В секции параметров описана модель, но отсутствуют параметры, соответствующие файлам. Для отправки запроса воспользуйтесь сторонними утилитами, например cURL.
     *
     * @param array $parameters {
     * @var string $projectId Идентификатор проекта
     * @var \SmartCat\Client\Model\UploadDocumentPropertiesModel $documentModel - optional Модель загрузки документа с файлом
     * @var  $file - optional {
     *      @var string $fileName - optional
     *      @var string $filePath | blob or stream $fileContent
     * }
     * @var string $disassembleAlgorithmName Опциональный алгоритм разбора файла.
     * @var string $externalId Внешний идентификатор задаваемый клиентом при создании документа
     * @var string $metaInfo Дополнительная пользовательская информация о документе
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\DocumentModel[]
     */
    public function projectAddDocument($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('projectId');
        if (!isset($parameters['file'])) {
            $queryParam->setRequired('documentModel');
            $queryParam->setFormParameters(['documentModel']);
        } else {
            trigger_error('parameter `file` is deprecated, use class `CreateDocumentPropertyWithFilesModel', E_USER_DEPRECATED);
            $queryParam->setRequired('file');
            $queryParam->setFormParameters(['file']);
        }
        $queryParam->setDefault('disassembleAlgorithmName', NULL);
        $queryParam->setDefault('externalId', NULL);
        $queryParam->setDefault('metaInfo', NULL);
        $queryParam->setDefault('targetLanguages', NULL);
        $headers = array_merge(['Host' => $this->host, 'Accept' => ['application/json']], $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        /** @var CreateDocumentPropertyWithFilesModel[] $documentModel */
        $documentModel = isset($parameters['documentModel']) ? $parameters['documentModel'] : null;

        $url = '/api/integration/v1/project/document';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));

        $builder = new MultipartStreamBuilder(new GuzzleStreamFactory());
        if ($documentModel) {
            $prepareDocumentModel = array_map(function (CreateDocumentPropertyWithFilesModel $n) {
                return $n->toCreateDocumentPropertyModel();
            }, $documentModel);
            $i = 0;
            foreach ($documentModel as $dm) {
                $file = $this->prepareFile($dm->getFile());
                $builder
                    ->addResource("file$i", $file['fileContent'], ['filename' => (isset($file['fileName']) ? $file['fileName'] : null), 'headers' => ['Content-Type' => "application/octet-stream"]]);
                $i++;
            }

            $builder
                ->addResource('documentModel', $this->serializer->serialize($prepareDocumentModel, 'json'), ['headers' => ['Content-Type' => 'application/json']]);
        } else {
            $parameters['file'] = $this->prepareFile($parameters['file']);
            $builder
                ->addResource('file', $parameters['file']['fileContent'], ['filename' => $parameters['file']['fileName'], 'headers' => ['Content-Type' => "application/octet-stream"]]);

        }
        $multipartStream = $builder->build();
        $boundary = $builder->getBoundary();
        $headers['Content-Type'] = 'multipart/form-data; boundary=' . $boundary;
        $body = $multipartStream->getContents();

        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCat\\Client\\Model\\DocumentModel[]', 'json');
            }
        }
        return $response;
    }

    //TODO: bool передается в апи как 0 или 1, а должен как true или false

    /**
     * @deprecated use projectGetProjectStatistics
     * @param string $projectId Идентификатор проекта
     * @param array $parameters {
     * @var bool $onlyExactMatches Необходимость только 100(и выше) матчей
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectGetProjectStatisticsObsolete($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $parameters = $this->prepareParams($parameters);
        $response = parent::projectGetProjectStatisticsObsolete($projectId, $parameters, $fetch);
        return $response;
    }

    //TODO: Если статистика не готова, метод возвращает plane текст, а не готовый ответ, генератор это обрабатывать не умеет
    //TODO: bool передается в апи как 0 или 1, а должен как true или false
    /**
     * Первый вызов запускает расчет статистики, последующие возвращают статистику или отвечают что она еще не готова
     *
     * @param string $projectId Идентификатор проекта
     * @param array $parameters {
     * @var bool $onlyExactMatches Необходимость только 100(и выше) матчей
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCat\Client\Model\ProjectStatisticsModel[]|string
     */
    public function projectGetProjectStatistics($projectId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $parameters = $this->prepareParams($parameters);
        $promise = parent::projectGetProjectStatistics($projectId, $parameters, self::FETCH_PROMISE);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCat\\Client\\Model\\ProjectStatisticsModel[]', 'json');
            }
            if ('202' == $response->getStatusCode()) {
                return (string)$response->getBody();
            }
        }
        return $response;
    }
}