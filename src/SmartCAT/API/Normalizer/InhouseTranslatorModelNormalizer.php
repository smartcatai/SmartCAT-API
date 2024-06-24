<?php

namespace SmartCat\Client\Normalizer;

use SmartCat\Client\Model\ServiceModel;

class InhouseTranslatorModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\InhouseTranslatorModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\InhouseTranslatorModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\InhouseTranslatorModel();
        if (isset($data['id'])) {
            $object->setId($data['id']);
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
        if (isset($data['externalId'])) {
            $object->setExternalId($data['externalId']);
        }
        if (isset($data['services'])) {
            $values = [];
            foreach ($data['services'] as $value) {
                $values[] = $this->serializer->deserialize($value, ServiceModel::class, 'raw', $context);
            }
            $object->setServices($values);
        }
        if (isset($data['clientIds'])) {
            $values = [];
            foreach ($data['clientIds'] as $value) {
                $values[] = $value;
            }
            $object->setClientIds($values);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();

        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
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
        if (null !== $object->getExternalId()) {
            $data->{'externalId'} = $object->getExternalId();
        }
        if (null !== $object->getServices()) {
            $values1 = [];
            foreach ($object->getServices() as $value1) {
                $values1[] = $this->serializer->serialize($value1, 'json');
            }
            $data->{'services'} = $values1;
        }
        if (null !== $object->getClientIds()) {
            $values2 = [];
            foreach ($object->getClientIds() as $value2) {
                $values2[] = $value2;
            }
            $data->{'clientIds'} = $values2;
        }

        return $data;
    }
}
