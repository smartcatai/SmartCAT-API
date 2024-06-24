<?php

namespace SmartCat\Client\Normalizer;

use Carbon\Carbon;

class TranslationMemoryModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\TranslationMemoryModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\TranslationMemoryModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\TranslationMemoryModel();
        if (isset($data['id'])) {
            $object->setId($data['id']);
        }
        if (isset($data['accountId'])) {
            $object->setAccountId($data['accountId']);
        }
        if (isset($data['clientId'])) {
            $object->setClientId($data['clientId']);
        }
        if (isset($data['name'])) {
            $object->setName($data['name']);
        }
        if (isset($data['description'])) {
            $object->setDescription($data['description']);
        }
        if (isset($data['sourceLanguage'])) {
            $object->setSourceLanguage($data['sourceLanguage']);
        }
        if (isset($data['targetLanguages'])) {
            $values = array();
            foreach ($data['targetLanguages'] as $value) {
                $values[] = $value;
            }
            $object->setTargetLanguages($values);
        }
        if (isset($data['createdDate'])) {
            $object->setCreatedDate($data['createdDate']);
        }
        if (isset($data['isAutomaticallyCreated'])) {
            $object->setIsAutomaticallyCreated($data['isAutomaticallyCreated']);
        }
        if (isset($data['unitCountByLanguageId'])) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['unitCountByLanguageId'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setUnitCountByLanguageId($values_1);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getAccountId()) {
            $data->{'accountId'} = $object->getAccountId();
        }
        if (null !== $object->getClientId()) {
            $data->{'clientId'} = $object->getClientId();
        }
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
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
        if (null !== $object->getCreatedDate()) {
            $data->{'createdDate'} = Carbon::parse($object->getCreatedDate())->toISOString();
        }
        if (null !== $object->getIsAutomaticallyCreated()) {
            $data->{'isAutomaticallyCreated'} = $object->getIsAutomaticallyCreated();
        }
        if (null !== $object->getUnitCountByLanguageId()) {
            $values_1 = new \stdClass();
            foreach ($object->getUnitCountByLanguageId() as $key => $value_1) {
                $values_1->{$key} = $value_1;
            }
            $data->{'unitCountByLanguageId'} = $values_1;
        }
        return $data;
    }
}
