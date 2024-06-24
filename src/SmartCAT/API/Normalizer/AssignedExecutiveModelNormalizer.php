<?php

namespace SmartCat\Client\Normalizer;

class AssignedExecutiveModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\AssignedExecutiveModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\AssignedExecutiveModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\AssignedExecutiveModel();
        if (isset($data['assignedWordsCount'])) {
            $object->setAssignedWordsCount($data['assignedWordsCount']);
        }
        if (isset($data['progress'])) {
            $object->setProgress($data['progress']);
        }
        if (isset($data['id'])) {
            $object->setId($data['id']);
        }
        if (isset($data['type'])) {
            $object->setType($data['type']);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getAssignedWordsCount()) {
            $data->{'assignedWordsCount'} = $object->getAssignedWordsCount();
        }
        if (null !== $object->getProgress()) {
            $data->{'progress'} = $object->getProgress();
        }
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getType()) {
            $data->{'type'} = $object->getType();
        }
        return $data;
    }
}
