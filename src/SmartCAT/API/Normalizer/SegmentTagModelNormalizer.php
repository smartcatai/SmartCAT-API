<?php

namespace SmartCat\Client\Normalizer;

class SegmentTagModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\SegmentTagModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\SegmentTagModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\SegmentTagModel();
        if (isset($data['tagNumber'])) {
            $object->setTagNumber($data['tagNumber']);
        }
        if (isset($data['tagType'])) {
            $object->setTagType($data['tagType']);
        }
        if (isset($data['position'])) {
            $object->setPosition($data['position']);
        }
        if (isset($data['isVirtual'])) {
            $object->setIsVirtual($data['isVirtual']);
        }
        if (isset($data['isInvisible'])) {
            $object->setIsInvisible($data['isInvisible']);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getTagNumber()) {
            $data->{'tagNumber'} = $object->getTagNumber();
        }
        if (null !== $object->getTagType()) {
            $data->{'tagType'} = $object->getTagType();
        }
        if (null !== $object->getPosition()) {
            $data->{'position'} = $object->getPosition();
        }
        if (null !== $object->getIsVirtual()) {
            $data->{'isVirtual'} = $object->getIsVirtual();
        }
        if (null !== $object->getIsInvisible()) {
            $data->{'isInvisible'} = $object->getIsInvisible();
        }
        return $data;
    }
}
