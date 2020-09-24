<?php

namespace SmartCat\Client\Normalizer;

class TagsFromUnitNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\TagsFromUnit') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\TagsFromUnit) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\TagsFromUnit();
        if (property_exists($data, 'position')) {
            $object->setPosition($data->{'position'});
        }
        if (property_exists($data, 'order')) {
            $object->setOrder($data->{'order'});
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getPosition()) {
            $data->{'position'} = $object->getPosition();
        }
        if (null !== $object->getOrder()) {
            $data->{'order'} = $object->getOrder();
        }
        return $data;
    }
}