<?php

namespace SmartCat\Client\Normalizer;

class CreateTranslationMemoryModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\CreateTranslationMemoryModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\CreateTranslationMemoryModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\CreateTranslationMemoryModel();
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
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
        if (property_exists($data, 'description')) {
            $object->setDescription($data->{'description'});
        }
        if (property_exists($data, 'clientId')) {
            $object->setClientId($data->{'clientId'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
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
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getClientId()) {
            $data->{'clientId'} = $object->getClientId();
        }
        return $data;
    }
}