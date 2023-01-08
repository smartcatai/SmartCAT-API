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
        $data = (array) $data;
        $properties = ['progress', 'stageType'];

        foreach ($properties as $property) {
            if (isset($data[$property])) {
                $object->{'set' . ucfirst($property)}($data[$property]);
            }
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