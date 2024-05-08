<?php

namespace SmartCat\Client\Normalizer;

use Carbon\Carbon;

class DocumentModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\DocumentModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\DocumentModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\DocumentModel();
        $data = (array) $data;
        $properties = ['id', 'name', 'creationDate', 'deadline', 'sourceLanguage', 'documentDisassemblingStatus', 'targetLanguage', 'status', 'wordsCount', 'statusModificationDate', 'pretranslateCompleted', 'workflowStages', 'externalId', 'metaInfo', 'placeholdersAreEnabled'];

        foreach ($properties as $property) {
            if (isset($data[$property])) {
                if (is_array($data[$property])) {                    
                    $values = [];
                    foreach ($data[$property] as $value) {                        
                        if ($property == 'workflowStages') {
                            $values[] = $this->serializer->deserialize(json_encode($value), 'SmartCat\\Client\\Model\\DocumentWorkflowStageModel', 'json', $context);
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
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getCreationDate()) {
            $data->{'creationDate'} = Carbon::parse($object->getCreationDate())->toISOString();
        }
        if (null !== $object->getDeadline()) {
            $data->{'deadline'} = Carbon::parse($object->getDeadline())->toISOString();
        }
        if (null !== $object->getSourceLanguage()) {
            $data->{'sourceLanguage'} = $object->getSourceLanguage();
        }
        if (null !== $object->getDocumentDisassemblingStatus()) {
            $data->{'documentDisassemblingStatus'} = $object->getDocumentDisassemblingStatus();
        }
        if (null !== $object->getTargetLanguage()) {
            $data->{'targetLanguage'} = $object->getTargetLanguage();
        }
        if (null !== $object->getStatus()) {
            $data->{'status'} = $object->getStatus();
        }
        if (null !== $object->getWordsCount()) {
            $data->{'wordsCount'} = $object->getWordsCount();
        }
        if (null !== $object->getStatusModificationDate()) {
            $data->{'statusModificationDate'} = Carbon::parse($object->getStatusModificationDate())->toISOString();
        }
        if (null !== $object->getPretranslateCompleted()) {
            $data->{'pretranslateCompleted'} = $object->getPretranslateCompleted();
        }
        if (null !== $object->getWorkflowStages()) {
            $values = array();
            foreach ($object->getWorkflowStages() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'workflowStages'} = $values;
        }
        if (null !== $object->getExternalId()) {
            $data->{'externalId'} = $object->getExternalId();
        }
        if (null !== $object->getMetaInfo()) {
            $data->{'metaInfo'} = $object->getMetaInfo();
        }
        if (null !== $object->getPlaceholdersAreEnabled()) {
            $data->{'placeholdersAreEnabled'} = $object->getPlaceholdersAreEnabled();
        }
        return $data;
    }
}
