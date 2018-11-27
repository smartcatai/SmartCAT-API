<?php

namespace SmartCat\Client\Manager;

use Http\Message\StreamFactory\GuzzleStreamFactory;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use SmartCat\Client\Helper\QueryParam;
use SmartCat\Client\Resource\TranslationMemoriesResource;

class TranslationMemoriesManager extends TranslationMemoriesResource
{
    use SmartCatManager;

    //TODO: Нет описания возвращаемых данных, API возращает кривоватый ответ заворачивая tmId в кавычки

    /**
     * @param \SmartCat\Client\Model\CreateTranslationMemoryModel $model
     * @param array $parameters
     * @param string $fetch
     * @return \Psr\Http\Message\ResponseInterface | string
     */
    public function translationMemoriesCreateEmptyTM(\SmartCat\Client\Model\CreateTranslationMemoryModel $model, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $res = parent::translationMemoriesCreateEmptyTM($model, $parameters, $fetch);

        if (self::FETCH_PROMISE === $fetch) {
            return $res;
        }

        $tmId = $res->getBody()->getContents();
        $tmId = str_replace('"', '', $tmId);
        return $tmId;
    }

    //TODO: Генератор не умет работать с файлами
    //TODO: bool передается в апи как 0 или 1, а должен как true или false
    /**
     * @param string $tmId Идентификатор ТМ
     * @param array $parameters {
     * @var bool $replaceAllContent Необходимость полной замены содержимого ТМ
     * @var  $tmxFile {
     * @var string $fileName - optional
     * @var string $filePath | blob or stream $fileContent
     *     }
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function translationMemoriesImport($tmId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $parameters = $this->prepareParams($parameters);
        $queryParam = new QueryParam();
        $queryParam->setRequired('replaceAllContent');
        $queryParam->setRequired('tmxFile');
        $queryParam->setFormParameters(array('tmxFile'));
        $url = '/api/integration/v1/translationmemory/{tmId}';
        $url = str_replace('{tmId}', urlencode($tmId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);

        $parameters['tmxFile'] = $this->prepareFile($parameters['tmxFile']);

        $builder = new MultipartStreamBuilder(new GuzzleStreamFactory());
        $builder
            ->addResource('uploadedFile', $parameters['tmxFile']['fileContent'], ['filename' => (isset($parameters['tmxFile']['fileName']) ? $parameters['tmxFile']['fileName'] : null), 'headers' => ['Content-Type' => "application/octet-stream"]]);
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
        return $response;
    }


    //TODO: translationMemoriesGetTMTranslations все свойства моделей указаны как необязательные, даже если они обязательны, PRX-19477

    //TODO: Не корректно указан тип входного параметра $targetLanguages, ожидается json string, а указан array
    /**
     * @param string $tmId Идентификатор ТМ
     * @param array $targetLanguages Массив требуемых таргет-языков
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function translationMemoriesSetTMTargetLanguages($tmId, array $targetLanguages, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('Content-Type', 'application/json');
        $queryParam->setHeaderParameters(['Content-Type']);
        $url = '/api/integration/v1/translationmemory/{tmId}/targets';
        $url = str_replace('{tmId}', urlencode($tmId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(['Host' => $this->host], $queryParam->buildHeaders($parameters));
        $body = $this->serializer->serialize($targetLanguages, 'json');
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
     *
     *
     * @param string $tmId Идентификатор ТМ
     * @param array $parameters {
     * @var bool $withTags Необходимость inline тегов после экспорта
     * @var bool $tradosCompatible Выгружать в формате, совместимом с Trados
     * }
     * @param string $fetch Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function translationMemoriesExportFile($tmId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $parameters = $this->prepareParams($parameters);
        $promise = parent::translationMemoriesExportFile($tmId, $parameters, self::FETCH_PROMISE);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;

    }
}