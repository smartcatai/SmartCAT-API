<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class CompletedWorkStatisticsModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\CompletedWorkStatisticsModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\CompletedWorkStatisticsModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\CompletedWorkStatisticsModel();
        if (property_exists($data, 'Statistics')) {
            $values = array();
            foreach ($data->{'Statistics'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCAT\\API\\Model\\StatisticsRowModel', 'raw', $context);
            }
            $object->setStatistics($values);
        }
        if (property_exists($data, 'Name')) {
            $object->setName($data->{'Name'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getStatistics()) {
            $values = array();
            foreach ($object->getStatistics() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'Statistics'} = $values;
        }
        if (null !== $object->getName()) {
            $data->{'Name'} = $object->getName();
        }
        return $data;
    }
}