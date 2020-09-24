<?php

namespace SmartCat\Client\Normalizer;

class UploadedFileNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\UploadedFile') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\UploadedFile) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\UploadedFile();
        if (property_exists($data, 'FullName')) {
            $object->setFullName($data->{'FullName'});
        }
        if (property_exists($data, 'Name')) {
            $object->setName($data->{'Name'});
        }
        if (property_exists($data, 'Extension')) {
            $object->setExtension($data->{'Extension'});
        }
        if (property_exists($data, 'MediaType')) {
            $object->setMediaType($data->{'MediaType'});
        }
        if (property_exists($data, 'FileSize')) {
            $object->setFileSize($data->{'FileSize'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getFullName()) {
            $data->{'FullName'} = $object->getFullName();
        }
        if (null !== $object->getName()) {
            $data->{'Name'} = $object->getName();
        }
        if (null !== $object->getExtension()) {
            $data->{'Extension'} = $object->getExtension();
        }
        if (null !== $object->getMediaType()) {
            $data->{'MediaType'} = $object->getMediaType();
        }
        if (null !== $object->getFileSize()) {
            $data->{'FileSize'} = $object->getFileSize();
        }
        return $data;
    }
}