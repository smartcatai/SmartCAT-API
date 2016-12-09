<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class CallbackErrorNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\CallbackError') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\CallbackError) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\CallbackError();
        if (property_exists($data, 'Id')) {
            $object->setId($data->{'Id'});
        }
        if (property_exists($data, 'Created')) {
            $object->setCreated(new \DateTime($data->{'Created'}));
        }
        if (property_exists($data, 'Expired')) {
            $object->setExpired(new \DateTime($data->{'Expired'}));
        }
        if (property_exists($data, 'ApplicationId')) {
            $object->setApplicationId($data->{'ApplicationId'});
        }
        if (property_exists($data, 'Url')) {
            $object->setUrl($data->{'Url'});
        }
        if (property_exists($data, 'FailResponse')) {
            $object->setFailResponse($this->serializer->deserialize($data->{'FailResponse'}, 'SmartCAT\\API\\Model\\FailResponse', 'raw', $context));
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'Id'} = $object->getId();
        }
        if (null !== $object->getCreated()) {
            $data->{'Created'} = $object->getCreated()->format("Y-m-d\TH:i:sP");
        }
        if (null !== $object->getExpired()) {
            $data->{'Expired'} = $object->getExpired()->format("Y-m-d\TH:i:sP");
        }
        if (null !== $object->getApplicationId()) {
            $data->{'ApplicationId'} = $object->getApplicationId();
        }
        if (null !== $object->getUrl()) {
            $data->{'Url'} = $object->getUrl();
        }
        if (null !== $object->getFailResponse()) {
            $data->{'FailResponse'} = $this->serializer->serialize($object->getFailResponse(), 'raw', $context);
        }
        return $data;
    }
}