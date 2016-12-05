<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ProjectWorkflowStageModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\ProjectWorkflowStageModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\ProjectWorkflowStageModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\ProjectWorkflowStageModel();
        if (property_exists($data, 'progress')) {
            $object->setProgress($data->{'progress'});
        }
        if (property_exists($data, 'stageType')) {
            $object->setStageType($data->{'stageType'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getProgress()) {
            $data->{'progress'} = $object->getProgress();
        }
        if (null !== $object->getStageType()) {
            $data->{'stageType'} = $object->getStageType();
        }
        return $data;
    }
}