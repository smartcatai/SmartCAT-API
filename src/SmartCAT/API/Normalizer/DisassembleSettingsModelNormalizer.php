<?php

namespace SmartCat\Client\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

class DisassembleSettingsModelNormalizer implements DenormalizerInterface, NormalizerInterface
{
    use SerializerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\DisassembleSettingsModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\Client\Model\DisassembleSettingsModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\Client\Model\DisassembleSettingsModel();
        if (isset($data['translatableAttributes'])) {
            $object->setTranslatableAttributes($data['translatableAttributes']);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getTranslatableAttributes()) {
            $data->{'translatableAttributes'} = $object->getTranslatableAttributes();
        }
        return $data;
    }
}
