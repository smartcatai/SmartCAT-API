<?php

namespace SmartCat\Client\Normalizer;

class UserModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\UserModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\UserModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\UserModel();
        if (isset($data['id'])) {
            $object->setId($data['id']);
        }
        if (isset($data['externalId'])) {
            $object->setExternalId($data['externalId']);
        }
        if (isset($data['email'])) {
            $object->setEmail($data['email']);
        }
        if (isset($data['firstName'])) {
            $object->setFirstName($data['firstName']);
        }
        if (isset($data['lastName'])) {
            $object->setLastName($data['lastName']);
        }
        if (isset($data['rightsGroup'])) {
            $object->setRightsGroup($data['rightsGroup']);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getExternalId()) {
            $data->{'externalId'} = $object->getExternalId();
        }
        if (null !== $object->getEmail()) {
            $data->{'email'} = $object->getEmail();
        }
        if (null !== $object->getFirstName()) {
            $data->{'firstName'} = $object->getFirstName();
        }
        if (null !== $object->getLastName()) {
            $data->{'lastName'} = $object->getLastName();
        }
        if (null !== $object->getRightsGroup()) {
            $data->{'rightsGroup'} = $object->getRightsGroup();
        }
        return $data;
    }
}
