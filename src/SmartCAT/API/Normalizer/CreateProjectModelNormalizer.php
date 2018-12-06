<?php

namespace SmartCat\Client\Normalizer;

class CreateProjectModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\CreateProjectModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\CreateProjectModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\CreateProjectModel();
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'description')) {
            $object->setDescription($data->{'description'});
        }
        if (property_exists($data, 'deadline')) {
            $object->setDeadline(new \DateTime($data->{'deadline'}));
        }
        if (property_exists($data, 'sourceLanguage')) {
            $object->setSourceLanguage($data->{'sourceLanguage'});
        }
        if (property_exists($data, 'targetLanguages')) {
            $values = array();
            foreach ($data->{'targetLanguages'} as $value) {
                $values[] = $value;
            }
            $object->setTargetLanguages($values);
        }
        if (property_exists($data, 'domainId')) {
            $object->setDomainId($data->{'domainId'});
        }
        if (property_exists($data, 'clientId')) {
            $object->setClientId($data->{'clientId'});
        }
        if (property_exists($data, 'vendorAccountIds')) {
            $values_1 = array();
            foreach ($data->{'vendorAccountIds'} as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setVendorAccountIds($values_1);
        }
        if (property_exists($data, 'assignToVendor')) {
            $object->setAssignToVendor($data->{'assignToVendor'});
        }
        if (property_exists($data, 'useMT')) {
            $object->setUseMT($data->{'useMT'});
        }
        if (property_exists($data, 'pretranslate')) {
            $object->setPretranslate($data->{'pretranslate'});
        }
        if (property_exists($data, 'translationMemoryName')) {
            $object->setTranslationMemoryName($data->{'translationMemoryName'});
        }
        if (property_exists($data, 'useTranslationMemory')) {
            $object->setUseTranslationMemory($data->{'useTranslationMemory'});
        }
        if (property_exists($data, 'autoPropagateRepetitions')) {
            $object->setAutoPropagateRepetitions($data->{'autoPropagateRepetitions'});
        }
        if (property_exists($data, 'disassembleAlgorithmNames')) {
            $values_1 = array();
            foreach ($data->{'disassembleAlgorithmNames'} as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setDisassembleAlgorithmNames($values_1);
        }
        if (property_exists($data, 'documentProperties')) {
            $values_2 = array();
            foreach ($data->{'documentProperties'} as $value_2) {
                $values_2[] = $this->serializer->deserialize($value_2, 'SmartCat\\Client\\Model\\CreateDocumentPropertyModel', 'raw', $context);
            }
            $object->setDocumentProperties($values_2);
        }
        if (property_exists($data, 'workflowStages')) {
            $values_3 = array();
            foreach ($data->{'workflowStages'} as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setWorkflowStages($values_3);
        }
        if (property_exists($data, 'isForTesting')) {
            $object->setIsForTesting($data->{'isForTesting'});
        }
        if (property_exists($data, 'externalTag')) {
            $object->setExternalTag($data->{'externalTag'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getDeadline()) {
            $data->{'deadline'} = $object->getDeadline()->format("Y-m-d\TH:i:sP");
        }
        if (null !== $object->getSourceLanguage()) {
            $data->{'sourceLanguage'} = $object->getSourceLanguage();
        }
        if (null !== $object->getTargetLanguages()) {
            $values = array();
            foreach ($object->getTargetLanguages() as $value) {
                $values[] = $value;
            }
            $data->{'targetLanguages'} = $values;
        }
        if (null !== $object->getDomainId()) {
            $data->{'domainId'} = $object->getDomainId();
        }
        if (null !== $object->getClientId()) {
            $data->{'clientId'} = $object->getClientId();
        }
        if (null !== $object->getVendorAccountIds()) {
            $values_1 = array();
            foreach ($object->getVendorAccountIds() as $value_1) {
                $values_1[] = $value_1;
            }
            $data->{'vendorAccountIds'} = $values_1;
        }
        if (null !== $object->getAssignToVendor()) {
            $data->{'assignToVendor'} = $object->getAssignToVendor();
        }
        if (null !== $object->getUseMT()) {
            $data->{'useMT'} = $object->getUseMT();
        }
        if (null !== $object->getPretranslate()) {
            $data->{'pretranslate'} = $object->getPretranslate();
        }
        if (null !== $object->getTranslationMemoryName()) {
            $data->{'translationMemoryName'} = $object->getTranslationMemoryName();
        }
        if (null !== $object->getUseTranslationMemory()) {
            $data->{'useTranslationMemory'} = $object->getUseTranslationMemory();
        }
        if (null !== $object->getAutoPropagateRepetitions()) {
            $data->{'autoPropagateRepetitions'} = $object->getAutoPropagateRepetitions();
        }
        if (null !== $object->getDisassembleAlgorithmNames()) {
            $values_1 = array();
            foreach ($object->getDisassembleAlgorithmNames() as $value_1) {
                $values_1[] = $value_1;
            }
            $data->{'disassembleAlgorithmNames'} = $values_1;
        }
        if (null !== $object->getDocumentProperties()) {
            $values_2 = array();
            foreach ($object->getDocumentProperties() as $value_2) {
                $values_2[] = $this->serializer->serialize($value_2, 'raw', $context);
            }
            $data->{'documentProperties'} = $values_2;
        }
        if (null !== $object->getWorkflowStages()) {
            $values_3 = array();
            foreach ($object->getWorkflowStages() as $value_3) {
                $values_3[] = $value_3;
            }
            $data->{'workflowStages'} = $values_3;
        }
        if (null !== $object->getIsForTesting()) {
            $data->{'isForTesting'} = $object->getIsForTesting();
        }
        if (null !== $object->getExternalTag()) {
            $data->{'externalTag'} = $object->getExternalTag();
        }
        return $data;
    }
}