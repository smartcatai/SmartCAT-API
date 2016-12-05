<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class DocumentTargetIdNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\DocumentTargetId') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\DocumentTargetId) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\DocumentTargetId();
        if (property_exists($data, 'DocumentId')) {
            $object->setDocumentId($data->{'DocumentId'});
        }
        if (property_exists($data, 'LanguageId')) {
            $object->setLanguageId($data->{'LanguageId'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getDocumentId()) {
            $data->{'DocumentId'} = $object->getDocumentId();
        }
        if (null !== $object->getLanguageId()) {
            $data->{'LanguageId'} = $object->getLanguageId();
        }
        return $data;
    }
}