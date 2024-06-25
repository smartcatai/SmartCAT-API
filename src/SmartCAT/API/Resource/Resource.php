<?php

namespace SmartCat\Client\Resource;

use GuzzleHttp\Client;
use SmartCat\Client\Http\HttpFactory;
use Symfony\Component\Serializer\SerializerInterface;

abstract class Resource
{
    const FETCH_RESPONSE = 'response';
    const FETCH_OBJECT = 'object';
    const FETCH_PROMISE = 'promise';
    /**
     * @var Client
     */
    protected $httpClient;
    /**
     * @var HttpFactory
     */
    protected HttpFactory $messageFactory;
    /**
     * @var SerializerInterface
     */
    protected SerializerInterface $serializer;

    public function __construct($httpClient, HttpFactory $messageFactory, SerializerInterface $serializer)
    {
        $this->httpClient = $httpClient;
        $this->messageFactory = $messageFactory;
        $this->serializer = $serializer;
    }
}
