<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Reference\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;

class UploadedFileNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\UploadedFile') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\UploadedFile) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (empty($data)) {
            return null;
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \SmartCAT\API\Model\UploadedFile();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
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
        if (property_exists($data, 'ContentLength')) {
            $object->setContentLength($data->{'ContentLength'});
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
        if (null !== $object->getContentLength()) {
            $data->{'ContentLength'} = $object->getContentLength();
        }
        return $data;
    }
}