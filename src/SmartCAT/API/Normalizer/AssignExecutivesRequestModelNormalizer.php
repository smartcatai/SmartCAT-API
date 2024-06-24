<?php

namespace SmartCat\Client\Normalizer;

class AssignExecutivesRequestModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\AssignExecutivesRequestModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\AssignExecutivesRequestModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\AssignExecutivesRequestModel();
        if (isset($data['executives'])) {
            $values = array();
            foreach ($data['executives'] as $value) {
                $values[] = $this->serializer->deserialize(json_encode($value), 'SmartCat\\Client\\Model\\Executive', 'json', $context);
            }
            $object->setExecutives($values);
        }
        if (isset($data['minWordsCountForExecutive'])) {
            $object->setMinWordsCountForExecutive($data['minWordsCountForExecutive']);
        }
        if (isset($data['assignmentMode'])) {
            $object->setAssignmentMode($data['assignmentMode']);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getExecutives()) {
            $values = array();
            foreach ($object->getExecutives() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'executives'} = $values;
        }
        if (null !== $object->getMinWordsCountForExecutive()) {
            $data->{'minWordsCountForExecutive'} = $object->getMinWordsCountForExecutive();
        }
        if (null !== $object->getAssignmentMode()) {
            $data->{'assignmentMode'} = $object->getAssignmentMode();
        }
        return $data;
    }
}
