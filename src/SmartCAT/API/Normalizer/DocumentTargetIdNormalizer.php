<?php

namespace SmartCat\Client\Normalizer;

class DocumentTargetIdNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\DocumentTargetId') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\DocumentTargetId) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\DocumentTargetId();
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