<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ProjectStatisticsObsoleteModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\ProjectStatisticsObsoleteModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\ProjectStatisticsObsoleteModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\ProjectStatisticsObsoleteModel();
        if (property_exists($data, 'statistics')) {
            $values = array();
            foreach ($data->{'statistics'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCAT\\API\\Model\\StatisticsRowModel', 'raw', $context);
            }
            $object->setStatistics($values);
        }
        if (property_exists($data, 'cost')) {
            $object->setCost($data->{'cost'});
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
            $data->{'statistics'} = $values;
        }
        if (null !== $object->getCost()) {
            $data->{'cost'} = $object->getCost();
        }
        return $data;
    }
}