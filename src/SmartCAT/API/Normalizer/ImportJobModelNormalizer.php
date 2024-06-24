<?php

namespace SmartCat\Client\Normalizer;

class ImportJobModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\ImportJobModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\ImportJobModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\ImportJobModel();
        if (isset($data['freelancerId'])) {
            $object->setFreelancerId($data['freelancerId']);
        }
        if (isset($data['serviceType'])) {
            $object->setServiceType($data['serviceType']);
        }
        if (isset($data['jobDescription'])) {
            $object->setJobDescription($data['jobDescription']);
        }
        if (isset($data['unitsType'])) {
            $object->setUnitsType($data['unitsType']);
        }
        if (isset($data['unitsAmount'])) {
            $object->setUnitsAmount($data['unitsAmount']);
        }
        if (isset($data['pricePerUnit'])) {
            $object->setPricePerUnit($data['pricePerUnit']);
        }
        if (isset($data['currency'])) {
            $object->setCurrency($data['currency']);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getFreelancerId()) {
            $data->{'freelancerId'} = $object->getFreelancerId();
        }
        if (null !== $object->getServiceType()) {
            $data->{'serviceType'} = $object->getServiceType();
        }
        if (null !== $object->getJobDescription()) {
            $data->{'jobDescription'} = $object->getJobDescription();
        }
        if (null !== $object->getUnitsType()) {
            $data->{'unitsType'} = $object->getUnitsType();
        }
        if (null !== $object->getUnitsAmount()) {
            $data->{'unitsAmount'} = $object->getUnitsAmount();
        }
        if (null !== $object->getPricePerUnit()) {
            $data->{'pricePerUnit'} = $object->getPricePerUnit();
        }
        if (null !== $object->getCurrency()) {
            $data->{'currency'} = $object->getCurrency();
        }
        return $data;
    }
}
