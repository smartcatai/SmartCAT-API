<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class NetRateModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\NetRateModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\NetRateModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\NetRateModel();
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'newWordsRate')) {
            $object->setNewWordsRate($data->{'newWordsRate'});
        }
        if (property_exists($data, 'repetitionsRate')) {
            $object->setRepetitionsRate($data->{'repetitionsRate'});
        }
        if (property_exists($data, 'tmMatchRates')) {
            $values = array();
            foreach ($data->{'tmMatchRates'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCAT\\API\\Model\\TMRangeRateModel', 'raw', $context);
            }
            $object->setTmMatchRates($values);
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
        if (null !== $object->getNewWordsRate()) {
            $data->{'newWordsRate'} = $object->getNewWordsRate();
        }
        if (null !== $object->getRepetitionsRate()) {
            $data->{'repetitionsRate'} = $object->getRepetitionsRate();
        }
        if (null !== $object->getTmMatchRates()) {
            $values = array();
            foreach ($object->getTmMatchRates() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'tmMatchRates'} = $values;
        }
        return $data;
    }
}