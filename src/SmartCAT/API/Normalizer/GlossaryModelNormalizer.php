<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class GlossaryModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\GlossaryModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\GlossaryModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\GlossaryModel();
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'description')) {
            $object->setDescription($data->{'description'});
        }
        if (property_exists($data, 'clientId')) {
            $object->setClientId($data->{'clientId'});
        }
        if (property_exists($data, 'languages')) {
            $values = array();
            foreach ($data->{'languages'} as $value) {
                $values[] = $value;
            }
            $object->setLanguages($values);
        }
        if (property_exists($data, 'units')) {
            $object->setUnits($data->{'units'});
        }
        if (property_exists($data, 'unitsPending')) {
            $object->setUnitsPending($data->{'unitsPending'});
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
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getClientId()) {
            $data->{'clientId'} = $object->getClientId();
        }
        if (null !== $object->getLanguages()) {
            $values = array();
            foreach ($object->getLanguages() as $value) {
                $values[] = $value;
            }
            $data->{'languages'} = $values;
        }
        if (null !== $object->getUnits()) {
            $data->{'units'} = $object->getUnits();
        }
        if (null !== $object->getUnitsPending()) {
            $data->{'unitsPending'} = $object->getUnitsPending();
        }
        return $data;
    }
}