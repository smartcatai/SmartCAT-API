<?php

namespace SmartCat\Client\Normalizer;

class TranslationMemoryForProjectModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\TranslationMemoryForProjectModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\TranslationMemoryForProjectModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\TranslationMemoryForProjectModel();
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'matchThreshold')) {
            $object->setMatchThreshold($data->{'matchThreshold'});
        }
        if (property_exists($data, 'isWritable')) {
            $object->setIsWritable($data->{'isWritable'});
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
        if (null !== $object->getIsWritable()) {
            $data->{'isWritable'} = $object->getIsWritable();
        }
        return $data;
    }
}