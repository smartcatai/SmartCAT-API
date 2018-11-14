<?php

namespace SmartCat\Client\Normalizer;

class TmMatchesRequestNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\TmMatchesRequest') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\TmMatchesRequest) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\TmMatchesRequest();
        if (property_exists($data, 'sourceLanguage')) {
            $object->setSourceLanguage($data->{'sourceLanguage'});
        }
        if (property_exists($data, 'targetLanguage')) {
            $object->setTargetLanguage($data->{'targetLanguage'});
        }
        if (property_exists($data, 'segmentModel')) {
            $object->setSegmentModel($this->serializer->deserialize($data->{'segmentModel'}, 'SmartCat\\Client\\Model\\SegmentModel', 'raw', $context));
        }
        if (property_exists($data, 'checkFuzzyMatches')) {
            $object->setCheckFuzzyMatches($data->{'checkFuzzyMatches'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getSourceLanguage()) {
            $data->{'sourceLanguage'} = $object->getSourceLanguage();
        }
        if (null !== $object->getTargetLanguage()) {
            $data->{'targetLanguage'} = $object->getTargetLanguage();
        }
        if (null !== $object->getSegmentModel()) {
            $data->{'segmentModel'} = $this->serializer->serialize($object->getSegmentModel(), 'raw', $context);
        }
        if (null !== $object->getCheckFuzzyMatches()) {
            $data->{'checkFuzzyMatches'} = $object->getCheckFuzzyMatches();
        }
        return $data;
    }
}