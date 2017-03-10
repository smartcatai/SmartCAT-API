<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class TranslationMemoriesForLanguageModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\TranslationMemoriesForLanguageModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\TranslationMemoriesForLanguageModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\TranslationMemoriesForLanguageModel();
        if (property_exists($data, 'language')) {
            $object->setLanguage($data->{'language'});
        }
        if (property_exists($data, 'translationMemories')) {
            $values = array();
            foreach ($data->{'translationMemories'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCAT\\API\\Model\\TranslationMemoryForProjectModel', 'raw', $context);
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