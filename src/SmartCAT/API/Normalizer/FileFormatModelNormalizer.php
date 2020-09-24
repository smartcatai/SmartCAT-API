<?php

namespace SmartCat\Client\Normalizer;

class FileFormatModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\FileFormatModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\FileFormatModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\FileFormatModel();
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'ocr')) {
            $object->setOcr($data->{'ocr'});
        }
        if (property_exists($data, 'mime-type')) {
            $object->setMimeType($data->{'mime-type'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getOcr()) {
            $data->{'ocr'} = $object->getOcr();
        }
        if (null !== $object->getMimeType()) {
            $data->{'mime-type'} = $object->getMimeType();
        }
        return $data;
    }
}