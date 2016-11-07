<?php

namespace SmartCAT\API\Manager;

use Joli\Jane\OpenApi\Client\QueryParam;
use SmartCAT\API\Resource\ProjectResource;

class ProjectManager extends ProjectResource
{
    use SmartCATManager;

    /**
     * Создать проект, генерирует multipart-запрос, содержащий модель в формате JSON (Content-Type=application/json) и один или несколько файлов (Content-Type=application/octet-stream).
     *
     * @param \SmartCAT\API\Model\CreateProjectWithFilesModel $project Модель создания проекта с файлами
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\ProjectModel
     */
    public function projectCreateProjectWithFiles(\SmartCAT\API\Model\CreateProjectWithFilesModel $project, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $formParams = [];
        $formParams['model']['value'] = $this->serializer->serialize($project, 'json');
        $formParams['model']['headers'] = array('Content-Type: application/json');
        // build file parameters
        $projectFile = $project->getFiles();
        $files = [];
        $i = 0;
        foreach ($projectFile as $fileName => $filePath) {
            $i++;
            $files['file' . $i] = [];
            $files['file' . $i]['filename'] = $fileName;
            $files['file' . $i]['content'] = file_get_contents($filePath);
        }
        $form_data = $this->createFormData($formParams, $files, ['Accept' => 'application/json']);

        $queryParam = new QueryParam();
        $url = '/api/integration/v1/project/create';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters), $form_data['headers']);
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $form_data['body']);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCAT\\API\\Model\\ProjectModel', 'json');
            }
        }
        return $response;
    }

    /**
     * Добавить документ к проекту, генерирует multipart-запрос, содержащий один файл (Content-Type=application/octet-stream).
     *
     * @param array $parameters {
     * @var string $projectId Идентификатор проекта
     * @var string $filePath путь к файлу
     * @var string $fileName имя файла
     * @var string $disassembleAlgorithmName Опциональный алгоритм разбора файла.
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\DocumentModel[]
     */
    public function projectAddDocument($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $formParams = [];
        $files['file'] = [];
        $files['file']['filename'] = $parameters['fileName'];
        $files['file']['content'] = file_get_contents($parameters['filePath']);
        $form_data = $this->createFormData($formParams, $files, ['Accept' => 'application/json']);
        unset($parameters['fileName']);
        unset($parameters['filePath']);
        $queryParam = new QueryParam();
        $queryParam->setRequired('projectId');
        $queryParam->setDefault('disassembleAlgorithmName', NULL);
        $url = '/api/integration/v1/project/document';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters), $form_data['headers']);
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $form_data['body']);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string)$response->getBody(), 'SmartCAT\\API\\Model\\DocumentModel[]', 'json');
            }
        }
        return $response;
    }

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
        $headers = array_merge(array('Host' => 'smartcat.ai'), $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($model, 'json');
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        return $response;
    }

}