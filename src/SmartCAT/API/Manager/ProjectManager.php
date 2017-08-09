<?php

namespace SmartCAT\API\Manager;

use Http\Discovery\StreamFactoryDiscovery;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use SmartCAT\API\Model\CreateDocumentPropertyWithFilesModel;
use SmartCAT\API\Resource\ProjectResource;

class ProjectManager extends ProjectResource
{
    use SmartCATManager;

    //TODO: Генератор не умет работать с файлами и multipart-запросами

    /**
     * Создать проект, генерирует multipart-запрос, содержащий модель в формате JSON (Content-Type=application/json) и один или несколько файлов (Content-Type=application/octet-stream).
     * @param \SmartCAT\API\Model\CreateProjectWithFilesModel $project Модель создания проекта с файлами
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\ProjectModel
     */
    public function projectCreateProjectWithFiles(\SmartCAT\API\Model\CreateProjectWithFilesModel $project, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/create';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Host' => $this->host], $queryParam->buildHeaders($parameters));

        $streamFactory = StreamFactoryDiscovery::find();
        $builder = new MultipartStreamBuilder($streamFactory);
        $builder
            ->addResource('model', $this->serializer->serialize($project, 'json'), ['headers' => ['Content-Type' => 'application/json']]);
        $projectFile = $project->getFiles();
        $i = 0;
        foreach ($projectFile as $fileName => $file) {
            $i++;
            $builder
                ->addResource(
                    'file' . $i,
                    $file['fileContent'],
                    [
                        'filename' => isset($file['fileName']) ? $file['fileName'] : null,
                        'headers' => ['Content-Type' => "application/octet-stream"]
                    ]
                );
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
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCAT\\API\\Model\\ProjectModel', 'json');
            }
        }
        return $response;
    }

    //TODO: Генератор не умет работать с файлами и multipart-запросами
    /**
     * @param array $parameters {
     * @var string $projectId Идентификатор проекта
     * @var \SmartCAT\API\Model\UploadDocumentPropertiesModel $documentModel - optional Модель загрузки документа с файлом
     * @var  $file {
     * @var string $fileName - optional
     * @var string $filePath | blob or stream $fileContent
     *     }
     * @var string $disassembleAlgorithmName Опциональный алгоритм разбора файла.
     * @var string $externalId Внешний идентификатор задаваемый клиентом при создании документа
     * @var string $metaInfo Дополнительная пользовательская информация о документе
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\DocumentModel[]
     */
    /**
     * Принимает multipart-запрос, содержащий модель в формате JSON (Content-Type=application/json) и один или несколько файлов (Content-Type=application/octet-stream). Swagger UI не поддерживает отображение и выполение таких запросов. В секции параметров описана модель, но отсутствуют параметры, соответствующие файлам. Для отправки запроса воспользуйтесь сторонними утилитами, например cURL.
     *
     * @param array $parameters {
     * @var string $projectId Идентификатор проекта
     * @var \SmartCAT\API\Model\CreateDocumentPropertyWithFilesModel[] $documentModel Модель загрузки документа с файлом
     * @var string $disassembleAlgorithmName Опциональный алгоритм разбора файла
     * @var string $externalId Внешний идентификатор задаваемый клиентом при создании документа
     * @var string $metaInfo Дополнительная пользовательская информация о документе
     * @var string $targetLanguages Языки перевода всех документов, перечисленные через запятую, опционально. Могут быть переопределены в отдельных документах в теле запроса. По-умолчанию используются языки перевода проекта.
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\DocumentModel[]
     */
    public function projectAddDocument($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        /** @var CreateDocumentPropertyWithFilesModel[] $documentModel */
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
        $documentModel = isset($parameters['documentModel']) ? $parameters['documentModel'] : null;

        $url = '/api/integration/v1/project/document';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));

        $streamFactory = StreamFactoryDiscovery::find();
        $builder = new MultipartStreamBuilder($streamFactory);
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
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCAT\\API\\Model\\DocumentModel[]', 'json');
            }
        }
        return $response;
    }

    //TODO: Нет передается Content-Type: application/json

    /**
     * Обновить проект по id
     *
     * @param string $projectId Идентификатор проекта
     * @param \SmartCAT\API\Model\ProjectChangesModel $model Модель изменений проекта
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectUpdateProject($projectId, \SmartCAT\API\Model\ProjectChangesModel $model, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters(['Content-Type']);
        $url = '/api/integration/v1/project/{projectId}';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Host' => $this->host], $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($model, 'json');
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
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
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\ProjectStatisticsModel[]|string
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
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCAT\\API\\Model\\ProjectStatisticsModel[]', 'json');
            }
            if ('202' == $response->getStatusCode()) {
                return (string)$response->getBody();
            }
        }
        return $response;
    }

    //TODO: Не корректно обрабатывается параметр $tmForLanguagesModels

    /**
     *
     *
     * @param string $projectId Идентификатор проекта
     * @param \SmartCAT\API\Model\TranslationMemoryForProjectModel[] $tmModels Коллекия ТМ
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectSetTranslationMemoriesForWholeProject($projectId, $tmModels, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/{projectId}/translationmemories';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Host' => $this->host, 'Accept' => ['application/json'], 'Content-Type' => 'application/json'], $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($tmModels, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }

    //TODO: Не корректно обрабатывается параметр $tmForLanguagesModels

    /**
     * Перезаписать набор ТМ подключенных к проекту, для каждого языка перевода проекта задается свой набор ТМ
     *
     * @param string $projectId Идентификатор проекта
     * @param \SmartCAT\API\Model\TranslationMemoriesForLanguageModel[] $tmForLanguagesModels Коллекия языков и заданных для них коллекций ТМ
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function projectSetProjectTranslationMemoriesByLanguages($projectId, $tmForLanguagesModels, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/{projectId}/translationmemories/bylanguages';
        $url = str_replace('{projectId}', urlencode($projectId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Host' => $this->host, 'Accept' => ['application/json'], 'Content-Type' => 'application/json'], $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($tmForLanguagesModels, 'json');
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
}