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
        $properties = ['id', 'name', 'creationDate', 'deadline', 'sourceLanguage', 'documentDisassemblingStatus', 'targetLanguage', 'status', 'wordsCount', 'pretranslateCompleted', 'workflowStages', 'externalId', 'metaInfo', 'placeholdersAreEnabled'];

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

        $object = new \SmartCat\Client\Model\DocumentModel();
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'creationDate')) {
            $object->setCreationDate($data->{'creationDate'});
        }
        if (property_exists($data, 'deadline')) {
            $object->setDeadline($data->{'deadline'});
        }
        if (property_exists($data, 'sourceLanguage')) {
            $object->setSourceLanguage($data->{'sourceLanguage'});
        }
        if (property_exists($data, 'documentDisassemblingStatus')) {
            $object->setDocumentDisassemblingStatus($data->{'documentDisassemblingStatus'});
        }
        if (property_exists($data, 'targetLanguage')) {
            $object->setTargetLanguage($data->{'targetLanguage'});
        }
        if (property_exists($data, 'status')) {
            $object->setStatus($data->{'status'});
        }
        if (property_exists($data, 'wordsCount')) {
            $object->setWordsCount($data->{'wordsCount'});
        }
        if (property_exists($data, 'statusModificationDate')) {
            $object->setStatusModificationDate($data->{'statusModificationDate'});
        }
        if (property_exists($data, 'pretranslateCompleted')) {
            $object->setPretranslateCompleted($data->{'pretranslateCompleted'});
        }
        if (property_exists($data, 'workflowStages')) {
            $values = array();
            foreach ($data->{'workflowStages'} as $value) {
                $values[] = $this->serializer->deserialize(json_encode($value), 'SmartCat\\Client\\Model\\DocumentWorkflowStageModel', 'json', $context);
            }
            $object->setWorkflowStages($values);
        }
        if (property_exists($data, 'externalId')) {
            $object->setExternalId($data->{'externalId'});
        }
        if (property_exists($data, 'metaInfo')) {
            $object->setMetaInfo($data->{'metaInfo'});
        }
        if (property_exists($data, 'placeholdersAreEnabled')) {
            $object->setPlaceholdersAreEnabled($data->{'placeholdersAreEnabled'});
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
