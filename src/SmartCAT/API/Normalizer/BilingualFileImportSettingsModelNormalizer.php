<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class BilingualFileImportSettingsModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\BilingualFileImportSettingsModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\BilingualFileImportSettingsModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\BilingualFileImportSettingsModel();
        if (property_exists($data, 'targetSubstitutionMode')) {
            $object->setTargetSubstitutionMode($data->{'targetSubstitutionMode'});
        }
        if (property_exists($data, 'lockMode')) {
            $object->setLockMode($data->{'lockMode'});
        }
        if (property_exists($data, 'confirmMode')) {
            $object->setConfirmMode($data->{'confirmMode'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getTargetSubstitutionMode()) {
            $data->{'targetSubstitutionMode'} = $object->getTargetSubstitutionMode();
        }
        if (null !== $object->getLockMode()) {
            $data->{'lockMode'} = $object->getLockMode();
        }
        if (null !== $object->getConfirmMode()) {
            $data->{'confirmMode'} = $object->getConfirmMode();
        }
        return $data;
    }
}