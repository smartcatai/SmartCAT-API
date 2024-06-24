<?php

namespace SmartCat\Client\Normalizer;

class CreateDocumentPropertyModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\CreateDocumentPropertyModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\CreateDocumentPropertyModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\CreateDocumentPropertyModel();
        if (isset($data['externalId'])) {
            $object->setExternalId($data['externalId']);
        }
        if (isset($data['metaInfo'])) {
            $object->setMetaInfo($data['metaInfo']);
        }
        if (isset($data['disassembleAlgorithmName'])) {
            $object->setDisassembleAlgorithmName($data['disassembleAlgorithmName']);
        }
        if (isset($data['bilingualFileImportSettings'])) {
            $object->setBilingualFileImportSettings($this->serializer->deserialize(json_encode($data['bilingualFileImportSettings']), 'SmartCat\\Client\\Model\\BilingualFileImportSettingsModel', 'json', $context));
        }
        if (isset($data['targetLanguages'])) {
            $values = array();
            foreach ($data['targetLanguages'] as $value) {
                $values[] = $value;
            }
            $object->setTargetLanguages($values);
        }
        if (isset($data['enablePlaceholders'])) {
            $object->setEnablePlaceholders($data['enablePlaceholders']);
        }
        if (isset($data['disassembleSettings'])) {
            $object->setDisassembleSettingsModel($this->serializer->deserialize($data['disassembleSettings'], 'SmartCat\\API\\Model\\DisassembleSettingsModel', 'raw', $context));
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getExternalId()) {
            $data->{'externalId'} = $object->getExternalId();
        }
        if (null !== $object->getMetaInfo()) {
            $data->{'metaInfo'} = $object->getMetaInfo();
        }
        if (null !== $object->getDisassembleAlgorithmName()) {
            $data->{'disassembleAlgorithmName'} = $object->getDisassembleAlgorithmName();
        }
        if (null !== $object->getBilingualFileImportSettings()) {
            $data->{'bilingualFileImportSettings'} = $this->serializer->serialize($object->getBilingualFileImportSettings(), 'json', $context);
        }
        if (null !== $object->getTargetLanguages()) {
            $values = array();
            foreach ($object->getTargetLanguages() as $value) {
                $values[] = $value;
            }
            $data->{'targetLanguages'} = $values;
        }
        if (null !== $object->getEnablePlaceholders()) {
            $data->{'enablePlaceholders'} = $object->getEnablePlaceholders();
        }
        if (null !== $object->getDisassembleSettings()) {
            $data->{'disassembleSettings'} = $this->serializer->serialize($object->getDisassembleSettings(), 'raw', $context);
        }
        return $data;
    }
}
