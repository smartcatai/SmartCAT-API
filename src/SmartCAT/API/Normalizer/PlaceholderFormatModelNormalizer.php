<?php

namespace SmartCat\Client\Normalizer;

class PlaceholderFormatModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\PlaceholderFormatModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\PlaceholderFormatModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\PlaceholderFormatModel();
        if (property_exists($data, 'regex')) {
            $object->setRegex($data->{'regex'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getRegex()) {
            $data->{'regex'} = $object->getRegex();
        }
        return $data;
    }
}