<?php

namespace SmartCat\Client\Resource;

use Http\Client\Common\FlexibleHttpClient;
use Http\Client\HttpAsyncClient;
use Http\Client\HttpClient;
use SmartCat\Client\Http\HttpFactory;
use Symfony\Component\Serializer\SerializerInterface;

abstract class Resource
{
    const FETCH_RESPONSE = 'response';
    const FETCH_OBJECT = 'object';
    const FETCH_PROMISE = 'promise';
    /**
     * @var HttpClient|HttpAsyncClient
     */
    protected $httpClient;
    /**
     * @var HttpFactory
     */
    protected $messageFactory;
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    public function __construct($httpClient, HttpFactory $messageFactory, SerializerInterface $serializer)
    {
        $this->httpClient = new FlexibleHttpClient($httpClient);
        $this->messageFactory = $messageFactory;
        $this->serializer = $serializer;
    }
}
