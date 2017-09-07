<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class CreateInvoiceModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\CreateInvoiceModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\CreateInvoiceModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\CreateInvoiceModel();
        if (property_exists($data, 'userId')) {
            $object->setUserId($data->{'userId'});
        }
        if (property_exists($data, 'jobIds')) {
            $values = array();
            foreach ($data->{'jobIds'} as $value) {
                $values[] = $value;
            }
            $object->setJobIds($values);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getUserId()) {
            $data->{'userId'} = $object->getUserId();
        }
        if (null !== $object->getJobIds()) {
            $values = array();
            foreach ($object->getJobIds() as $value) {
                $values[] = $value;
            }
            $data->{'jobIds'} = $values;
        }
        return $data;
    }
}