<?php

namespace SmartCat\Client\Normalizer;

class DocumentWorkflowStageModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\DocumentWorkflowStageModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\DocumentWorkflowStageModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\DocumentWorkflowStageModel();
        $data = (array) $data;

        $properties = ['progress', 'wordsTranslated', 'unassignedWordsCount', 'status', 'executives'];

        foreach ($properties as $property) {
            if (isset($data[$property])) {
                if (is_array($data[$property])) {                    
                    $values = [];
                    foreach ($data[$property] as $value) {                        
                        if ($property == 'executives') {
                            $values[] = $this->serializer->deserialize(json_encode($value), 'SmartCat\\Client\\Model\\AssignedExecutiveModel', 'json', $context);
                        } else {
                            $values[] = $value;
                        }
                    }
                    $setter = 'set' . ucfirst($property);
                    $object->$setter($values);
                } else {
                    $setter = 'set' . ucfirst($property);
                    $object->$setter($data[$property]);
                }
            }
        }

        return $object;         

        $object = new \SmartCat\Client\Model\DocumentWorkflowStageModel();
        if (property_exists($data, 'progress')) {
            $object->setProgress($data->{'progress'});
        }
        if (property_exists($data, 'wordsTranslated')) {
            $object->setWordsTranslated($data->{'wordsTranslated'});
        }
        if (property_exists($data, 'unassignedWordsCount')) {
            $object->setUnassignedWordsCount($data->{'unassignedWordsCount'});
        }
        if (property_exists($data, 'status')) {
            $object->setStatus($data->{'status'});
        }
        if (property_exists($data, 'executives')) {
            $values = array();
            foreach ($data->{'executives'} as $value) {
                $values[] = $this->serializer->deserialize(json_encode($value), 'SmartCat\\Client\\Model\\AssignedExecutiveModel', 'json', $context);
            }
            $object->setExecutives($values);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getProgress()) {
            $data->{'progress'} = $object->getProgress();
        }
        if (null !== $object->getWordsTranslated()) {
            $data->{'wordsTranslated'} = $object->getWordsTranslated();
        }
        if (null !== $object->getUnassignedWordsCount()) {
            $data->{'unassignedWordsCount'} = $object->getUnassignedWordsCount();
        }
        if (null !== $object->getStatus()) {
            $data->{'status'} = $object->getStatus();
        }
        if (null !== $object->getExecutives()) {
            $values = array();
            foreach ($object->getExecutives() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'executives'} = $values;
        }
        return $data;
    }
}
