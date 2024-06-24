<?php

namespace SmartCat\Client\Normalizer;

class ProjectTranslationMemoryModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\ProjectTranslationMemoryModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\ProjectTranslationMemoryModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\ProjectTranslationMemoryModel();
        if (isset($data['id'])) {
            $object->setId($data['id']);
        }
        if (isset($data['matchThreshold'])) {
            $object->setMatchThreshold($data['matchThreshold']);
        }
        if (isset($data['targetLanguageId'])) {
            $object->setTargetLanguageId($data['targetLanguageId']);
        }
        if (isset($data['isWritable'])) {
            $object->setIsWritable($data['isWritable']);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getMatchThreshold()) {
            $data->{'matchThreshold'} = $object->getMatchThreshold();
        }
        if (null !== $object->getTargetLanguageId()) {
            $data->{'targetLanguageId'} = $object->getTargetLanguageId();
        }
        if (null !== $object->getIsWritable()) {
            $data->{'isWritable'} = $object->getIsWritable();
        }
        return $data;
    }
}
