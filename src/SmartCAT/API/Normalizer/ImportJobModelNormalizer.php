<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ImportJobModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\ImportJobModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\ImportJobModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\ImportJobModel();
        if (property_exists($data, 'freelancerId')) {
            $object->setFreelancerId($data->{'freelancerId'});
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