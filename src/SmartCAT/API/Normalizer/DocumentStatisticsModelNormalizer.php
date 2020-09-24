<?php

namespace SmartCat\Client\Normalizer;

class DocumentStatisticsModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\DocumentStatisticsModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\DocumentStatisticsModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\DocumentStatisticsModel();
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'statistics')) {
            $values = array();
            foreach ($data->{'statistics'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCat\\Client\\Model\\StatisticsRowModel', 'raw', $context);
            }
            $object->setStatistics($values);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getStatistics()) {
            $values = array();
            foreach ($object->getStatistics() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'statistics'} = $values;
        }
        return $data;
    }
}