<?php

namespace SmartCat\Client\Normalizer;

class AccountModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\AccountModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\AccountModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\AccountModel();

        $data = (array) $data;
        $properties = ['id', 'name', 'isPersonal', 'type'];

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
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getIsPersonal()) {
            $data->{'isPersonal'} = $object->getIsPersonal();
        }
        if (null !== $object->getType()) {
            $data->{'type'} = $object->getType();
        }
        return $data;
    }
}
