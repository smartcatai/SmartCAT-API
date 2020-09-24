<?php

namespace SmartCat\Client\Normalizer;

use SmartCat\Client\Model\ImportJobModelV2;

class ImportJobModelV2Normalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\ImportJobModelV2') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\ImportJobModelV2) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\ImportJobModelV2();
        if (property_exists($data, 'supplierEmail')) {
            $object->setSupplierEmail($data->{'supplierEmail'});
        }
        if (property_exists($data, 'supplierName')) {
            $object->setSupplierName($data->{'supplierName'});
        }
        if (property_exists($data, 'supplierType')) {
            $object->setSupplierType($data->{'supplierType'});
        }
        if (property_exists($data, 'serviceType')) {
            $object->setServiceType($data->{'serviceType'});
        }
        if (property_exists($data, 'jobDescription')) {
            $object->setJobDescription($data->{'jobDescription'});
        }
        if (property_exists($data, 'unitsType')) {
            $object->setUnitsType($data->{'unitsType'});
        }
        if (property_exists($data, 'unitsAmount')) {
            $object->setUnitsAmount($data->{'unitsAmount'});
        }
        if (property_exists($data, 'pricePerUnit')) {
            $object->setPricePerUnit($data->{'pricePerUnit'});
        }
        if (property_exists($data, 'currency')) {
            $object->setCurrency($data->{'currency'});
        }
        if (property_exists($data, 'externalNumber')) {
            $object->setExternalNumber($data->{'externalNumber'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();

        if (null !== $object->getSupplierEmail()) {
            $data->{'supplierEmail'} = $object->getSupplierEmail();
        }
        if (null !== $object->getSupplierName()) {
            $data->{'supplierName'} = $object->getSupplierName();
        }
        if (null !== $object->getSupplierType()) {
            $data->{'supplierType'} = $object->getSupplierType();
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
        if (null !== $object->getExternalNumber()) {
            $data->{'externalNumber'} = $object->getExternalNumber();
        }
        return $data;
    }
}