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
        if (isset($data['accountId'])) {
            $object->setAccountId($data['accountId']);
        }
        if (isset($data['id'])) {
            $object->setId($data['id']);
        }
        if (isset($data['translationMemoryId'])) {
            $object->setTranslationMemoryId($data['translationMemoryId']);
        }
        if (isset($data['state'])) {
            $object->setState($data['state']);
        }
        if (isset($data['insertedUnitCount'])) {
            $object->setInsertedUnitCount($data['insertedUnitCount']);
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
