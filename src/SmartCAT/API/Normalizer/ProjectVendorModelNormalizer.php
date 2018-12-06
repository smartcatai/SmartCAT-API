<?php

namespace SmartCat\Client\Normalizer;

use SmartCat\Client\Model\ProjectVendorModel;

class ProjectVendorModelNormalizer extends AbstractNormalizer
{
    /**
     * @param $data
     * @param $type
     * @param null $format
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\ProjectVendorModel') {
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
        if ($data instanceof \SmartCat\Client\Model\ProjectVendorModel) {
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
        $object = new \SmartCat\Client\Model\ProjectVendorModel();
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
