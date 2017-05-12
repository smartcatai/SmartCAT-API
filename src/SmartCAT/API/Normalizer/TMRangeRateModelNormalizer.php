<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class TMRangeRateModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\TMRangeRateModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\TMRangeRateModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\TMRangeRateModel();
        if (property_exists($data, 'fromQuality')) {
            $object->setFromQuality($data->{'fromQuality'});
        }
        if (property_exists($data, 'toQuality')) {
            $object->setToQuality($data->{'toQuality'});
        }
        if (property_exists($data, 'value')) {
            $object->setValue($data->{'value'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getFromQuality()) {
            $data->{'fromQuality'} = $object->getFromQuality();
        }
        if (null !== $object->getToQuality()) {
            $data->{'toQuality'} = $object->getToQuality();
        }
        if (null !== $object->getValue()) {
            $data->{'value'} = $object->getValue();
        }
        return $data;
    }
}