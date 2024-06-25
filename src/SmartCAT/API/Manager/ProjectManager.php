<?php

namespace SmartCat\Client\Manager;

use GuzzleHttp\Psr7\MultipartStream;
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
     * @return \GuzzleHttp\Promise\PromiseInterface|\SmartCat\Client\Model\ProjectModel
     */
    public function projectCreateProjectWithFiles(\SmartCat\Client\Model\CreateProjectWithFilesModel $project, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = $this->host . '/api/integration/v1/project/create';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = $queryParam->buildHeaders($parameters);

        $body = [];
        $body[] = [
            'name' => 'model',
            'contents' => $this->serializer->serialize($project, 'json'),
            'headers' => ['Content-Type' => 'application/json'],
        ];
        $projectFiles = $project->getFiles();
        $i = 0;
        foreach ($projectFiles as $file) {
            $i++;
            $body[] = [
                'name' => "file_$i",
                'contents' => $file['fileContent'],
                'filename' => $file['fileName'] ?? null,
                'headers' => ['Content-Type' => "application/octet-stream"]
            ];
        }

        $multipartStream = new MultipartStream($body);
        $boundary = $multipartStream->getBoundary();
        $headers['Content-Type'] = 'multipart/form-data; boundary="' . $boundary . '"';

        $request = $this->messageFactory->createRequest('POST', $url, $headers, $multipartStream);
        $promise = $this->httpClient->sendAsync($request);
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
     * @return \GuzzleHttp\Promise\PromiseInterface|\SmartCat\Client\Model\DocumentModel[]
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
        $headers = array_merge(['Accept' => ['application/json']], $queryParam->buildHeaders($parameters));
        /** @var CreateDocumentPropertyWithFilesModel[] $documentModel */
        $documentModel = isset($parameters['documentModel']) ? $parameters['documentModel'] : null;

        $url = $this->host . '/api/integration/v1/project/document';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));

        $body = [];
        if ($documentModel) {
            $prepareDocumentModel = array_map(function (CreateDocumentPropertyWithFilesModel $n) {
                return $n->toCreateDocumentPropertyModel();
            }, $documentModel);
            $i = 0;
            foreach ($documentModel as $dm) {
                $file = $this->prepareFile($dm->getFile());
                $body[] = [
                    'name' => "file$i",
                    'contents' => $file["fileContent"],
                    'filename' => isset($file['fileName']) ? $this->prepareFileName($file['fileName']) : null
                ];

                $i++;
            }

            $body[] = [
                'name'     => 'documentModel',
                'contents' => $this->serializer->serialize($prepareDocumentModel, 'json'),
                'headers'  => ['Content-Type' => 'application/json']
            ];
        } else {
            $parameters['file'] = $this->prepareFile($parameters['file']);

            $body[] = [
                'name'     => "file",
                'contents' => $parameters['file']['fileContent'],
                'filename' => $this->prepareFileName($parameters['file']['fileName']),
                'headers' => ['Content-Type' => "application/octet-stream"]
            ];
        }
        $stream = new MultipartStream($body);
        $boundary = $stream->getBoundary();
        $headers['Content-Type'] = 'multipart/form-data; boundary=' . $boundary;

        $request = $this->messageFactory->createRequest('POST', $url, $headers, $stream);
        $promise = $this->httpClient->sendAsync($request);
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

    private function prepareFileName($fileName)
    {
        return preg_replace('/[\<\>\|\:\*\?]/', '_', $fileName);
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
     * @return \GuzzleHttp\Promise\PromiseInterface
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
     * @return \GuzzleHttp\Promise\PromiseInterface|\SmartCat\Client\Model\ProjectStatisticsModel[]|string
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
