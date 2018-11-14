<?php

namespace SmartCat\Client\Normalizer;

class AssignableExecutiveModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\AssignableExecutiveModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\AssignableExecutiveModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\AssignableExecutiveModel();
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'surname')) {
            $object->setSurname($data->{'surname'});
        }
        if (property_exists($data, 'email')) {
            $object->setEmail($data->{'email'});
        }
        if (property_exists($data, 'md5HashOfEMail')) {
            $object->setMd5HashOfEMail($data->{'md5HashOfEMail'});
        }
        if (property_exists($data, 'type')) {
            $object->setType($data->{'type'});
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
        if (null !== $object->getSurname()) {
            $data->{'surname'} = $object->getSurname();
        }
        if (null !== $object->getEmail()) {
            $data->{'email'} = $object->getEmail();
        }
        if (null !== $object->getMd5HashOfEMail()) {
            $data->{'md5HashOfEMail'} = $object->getMd5HashOfEMail();
        }
        if (null !== $object->getType()) {
            $data->{'type'} = $object->getType();
        }
        return $data;
    }
}
