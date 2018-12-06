<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use SmartCAT\API\Model\ProjectVendorModel;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;

class ProjectVendorModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    /**
     * @param $data
     * @param $type
     * @param null $format
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\ProjectVendorModel') {
            return false;
        }
        return true;
    }
    /**
     * @param $data
     * @param null $format
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\ProjectVendorModel) {
            return true;
        }
        return false;
    }
    /**
     * @param $data
     * @param $class
     * @param null $format
     * @param array $context
     * @return ProjectVendorModel
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\ProjectVendorModel();
        if (property_exists($data, 'vendorAccountId')) {
            $object->setVendorAccountId($data->{'vendorAccountId'});
        }
        if (property_exists($data, 'removedFromProject')) {
            $object->setRemovedFromProject($data->{'removedFromProject'});
        }
        return $object;
    }
    /**
     * @param ProjectVendorModel $object
     * @param null $format
     * @param array $context
     * @return \stdClass
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getVendorAccountId()) {
            $data->{'vendorAccountId'} = $object->getVendorAccountId();
        }
        if (null !== $object->getRemovedFromProject()) {
            $data->{'removedFromProject'} = $object->getRemovedFromProject();
        }
        return $data;
    }
}
