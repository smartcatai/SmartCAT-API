<?php

namespace SmartCat\Client\Normalizer;

class TMImportTaskModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\TMImportTaskModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\TMImportTaskModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\TMImportTaskModel();
        if (property_exists($data, 'accountId')) {
            $object->setAccountId($data->{'accountId'});
        }
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'translationMemoryId')) {
            $object->setTranslationMemoryId($data->{'translationMemoryId'});
        }
        if (property_exists($data, 'state')) {
            $object->setState($data->{'state'});
        }
        if (property_exists($data, 'insertedUnitCount')) {
            $object->setInsertedUnitCount($data->{'insertedUnitCount'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getAccountId()) {
            $data->{'accountId'} = $object->getAccountId();
        }
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getTranslationMemoryId()) {
            $data->{'translationMemoryId'} = $object->getTranslationMemoryId();
        }
        if (null !== $object->getState()) {
            $data->{'state'} = $object->getState();
        }
        if (null !== $object->getInsertedUnitCount()) {
            $data->{'insertedUnitCount'} = $object->getInsertedUnitCount();
        }
        return $data;
    }
}