<?php

namespace SmartCat\Client\Normalizer;

class CreateInvoiceModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\CreateInvoiceModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\CreateInvoiceModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\CreateInvoiceModel();
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