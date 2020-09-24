<?php

namespace SmartCat\Client\Normalizer;

class UploadDocumentPropertiesModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\UploadDocumentPropertiesModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\UploadDocumentPropertiesModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\UploadDocumentPropertiesModel();
        if (property_exists($data, 'bilingualFileImportSettings')) {
            $object->setBilingualFileImportSettings($this->serializer->deserialize($data->{'bilingualFileImportSettings'}, 'SmartCat\\Client\\Model\\BilingualFileImportSettingsModel', 'raw', $context));
        }
        if (property_exists($data, 'enablePlaceholders')) {
            $object->setEnablePlaceholders($data->{'enablePlaceholders'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getBilingualFileImportSettings()) {
            $data->{'bilingualFileImportSettings'} = $this->serializer->serialize($object->getBilingualFileImportSettings(), 'raw', $context);
        }
        if (null !== $object->getEnablePlaceholders()) {
            $data->{'enablePlaceholders'} = $object->getEnablePlaceholders();
        }
        return $data;
    }
}