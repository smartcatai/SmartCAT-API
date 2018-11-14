<?php

namespace SmartCat\Client\Normalizer;

class CreateUserRequestNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\CreateUserRequest') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\CreateUserRequest) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\CreateUserRequest();
        if (property_exists($data, 'email')) {
            $object->setEmail($data->{'email'});
        }
        if (property_exists($data, 'firstName')) {
            $object->setFirstName($data->{'firstName'});
        }
        if (property_exists($data, 'lastName')) {
            $object->setLastName($data->{'lastName'});
        }
        if (property_exists($data, 'externalId')) {
            $object->setExternalId($data->{'externalId'});
        }
        if (property_exists($data, 'rightsGroup')) {
            $object->setRightsGroup($data->{'rightsGroup'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getEmail()) {
            $data->{'email'} = $object->getEmail();
        }
        if (null !== $object->getFirstName()) {
            $data->{'firstName'} = $object->getFirstName();
        }
        if (null !== $object->getLastName()) {
            $data->{'lastName'} = $object->getLastName();
        }
        if (null !== $object->getExternalId()) {
            $data->{'externalId'} = $object->getExternalId();
        }
        if (null !== $object->getRightsGroup()) {
            $data->{'rightsGroup'} = $object->getRightsGroup();
        }
        return $data;
    }
}