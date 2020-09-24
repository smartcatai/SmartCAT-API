<?php

namespace SmartCat\Client\Normalizer;

class CancelInvoiceModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\CancelInvoiceModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\CancelInvoiceModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\CancelInvoiceModel();
        if (property_exists($data, 'userId')) {
            $object->setUserId($data->{'userId'});
        }
        if (property_exists($data, 'invoiceId')) {
            $object->setInvoiceId($data->{'invoiceId'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getUserId()) {
            $data->{'userId'} = $object->getUserId();
        }
        if (null !== $object->getInvoiceId()) {
            $data->{'invoiceId'} = $object->getInvoiceId();
        }
        return $data;
    }
}