<?php

namespace SmartCat\Client\Normalizer;

class ProjectStatisticsModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\ProjectStatisticsModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\ProjectStatisticsModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\ProjectStatisticsModel();
        if (property_exists($data, 'language')) {
            $object->setLanguage($data->{'language'});
        }
        if (property_exists($data, 'statistics')) {
            $values = array();
            foreach ($data->{'statistics'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCat\\Client\\Model\\StatisticsRowModel', 'raw', $context);
            }
            $object->setStatistics($values);
        }
        if (property_exists($data, 'cost')) {
            $object->setCost($data->{'cost'});
        }
        if (property_exists($data, 'documents')) {
            $values_1 = array();
            foreach ($data->{'documents'} as $value_1) {
                $values_1[] = $this->serializer->deserialize($value_1, 'SmartCat\\Client\\Model\\DocumentStatisticsModel', 'raw', $context);
            }
            $object->setDocuments($values_1);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getLanguage()) {
            $data->{'language'} = $object->getLanguage();
        }
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
        if (null !== $object->getDocuments()) {
            $values_1 = array();
            foreach ($object->getDocuments() as $value_1) {
                $values_1[] = $this->serializer->serialize($value_1, 'raw', $context);
            }
            $data->{'documents'} = $values_1;
        }
        return $data;
    }
}