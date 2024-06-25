<?php

namespace SmartCat\Client\Normalizer;

class ServiceModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\ServiceModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\ServiceModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\ServiceModel();
        if (isset($data['serviceType'])) {
            $object->setServiceType($data['serviceType']);
        }
        if (isset($data['sourceLanguage'])) {
            $object->setSourceLanguage($data['sourceLanguage']);
        }
        if (isset($data['targetLanguage'])) {
            $object->setTargetLanguage($data['targetLanguage']);
        }
        if (isset($data['pricePerUnit'])) {
            $object->setPricePerUnit($data['pricePerUnit']);
        }
        if (isset($data['currency'])) {
            $object->setCurrency($data['currency']);
        }
        if (isset($data['specializations'])) {
            $values = [];
            foreach ($data['specializations'] as $value) {
                $values[] = $value;
            }
            $object->setSpecializations($values);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();

        if (null !== $object->getServiceType()) {
            $data->{'serviceType'} = $object->getServiceType();
        }
        if (null !== $object->getSourceLanguage()) {
            $data->{'sourceLanguage'} = $object->getSourceLanguage();
        }
        if (null !== $object->getTargetLanguage()) {
            $data->{'targetLanguage'} = $object->getTargetLanguage();
        }
        if (null !== $object->getPricePerUnit()) {
            $data->{'pricePerUnit'} = $object->getPricePerUnit();
        }
        if (null !== $object->getCurrency()) {
            $data->{'currency'} = $object->getCurrency();
        }
        if (null !== $object->getSpecializations()) {
            $values = [];
            foreach ($object->getSpecializations() as $value) {
                $values[] = $value;
            }
            $data->{'specializations'} = $values;
        }

        return $data;
    }
}
