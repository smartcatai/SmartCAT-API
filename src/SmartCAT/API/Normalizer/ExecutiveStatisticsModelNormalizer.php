<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ExecutiveStatisticsModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\ExecutiveStatisticsModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\ExecutiveStatisticsModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\ExecutiveStatisticsModel();
        if (property_exists($data, 'executive')) {
            $object->setExecutive($this->serializer->deserialize($data->{'executive'}, 'SmartCAT\\API\\Model\\ExecutiveModel', 'raw', $context));
        }
        if (property_exists($data, 'stageType')) {
            $object->setStageType($data->{'stageType'});
        }
        if (property_exists($data, 'stageNumber')) {
            $object->setStageNumber($data->{'stageNumber'});
        }
        if (property_exists($data, 'targetLanguage')) {
            $object->setTargetLanguage($data->{'targetLanguage'});
        }
        if (property_exists($data, 'total')) {
            $values = array();
            foreach ($data->{'total'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCAT\\API\\Model\\StatisticsRowModel', 'raw', $context);
            }
            $object->setTotal($values);
        }
        if (property_exists($data, 'documents')) {
            $values_1 = array();
            foreach ($data->{'documents'} as $value_1) {
                $values_1[] = $this->serializer->deserialize($value_1, 'SmartCAT\\API\\Model\\CompletedWorkStatisticsModel', 'raw', $context);
            }
            $object->setDocuments($values_1);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getExecutive()) {
            $data->{'executive'} = $this->serializer->serialize($object->getExecutive(), 'raw', $context);
        }
        if (null !== $object->getStageType()) {
            $data->{'stageType'} = $object->getStageType();
        }
        if (null !== $object->getStageNumber()) {
            $data->{'stageNumber'} = $object->getStageNumber();
        }
        if (null !== $object->getTargetLanguage()) {
            $data->{'targetLanguage'} = $object->getTargetLanguage();
        }
        if (null !== $object->getTotal()) {
            $values = array();
            foreach ($object->getTotal() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'total'} = $values;
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