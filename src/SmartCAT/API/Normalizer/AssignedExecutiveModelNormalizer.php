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
        $data = (array) $data;
        $properties = ['assignedWordsCount', 'progress', 'id', 'type'];

        foreach ($properties as $property) {
            if (isset($data[$property])) {
                $object->{'set' . ucfirst($property)}($data[$property]);
            }
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
