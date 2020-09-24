<?php

namespace SmartCat\Client\Normalizer;

class TranslationMemoriesForLanguageModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\TranslationMemoriesForLanguageModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\TranslationMemoriesForLanguageModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\TranslationMemoriesForLanguageModel();
        if (property_exists($data, 'language')) {
            $object->setLanguage($data->{'language'});
        }
        if (property_exists($data, 'translationMemories')) {
            $values = array();
            foreach ($data->{'translationMemories'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCat\\Client\\Model\\TranslationMemoryForProjectModel', 'raw', $context);
            }
            $object->setTranslationMemories($values);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getLanguage()) {
            $data->{'language'} = $object->getLanguage();
        }
        if (null !== $object->getTranslationMemories()) {
            $values = array();
            foreach ($object->getTranslationMemories() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'translationMemories'} = $values;
        }
        return $data;
    }
}