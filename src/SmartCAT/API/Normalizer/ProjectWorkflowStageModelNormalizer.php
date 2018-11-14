<?php

namespace SmartCat\Client\Normalizer;

class ProjectWorkflowStageModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\ProjectWorkflowStageModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\ProjectWorkflowStageModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\ProjectWorkflowStageModel();
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