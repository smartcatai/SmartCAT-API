<?php

namespace SmartCat\Client\Normalizer;

use SmartCat\Client\Model\DirectoryItemModel;
use SmartCat\Client\Model\DirectoryModel;

class DirectoryModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\DirectoryModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof DirectoryModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new DirectoryModel();
        if (property_exists($data, 'type')) {
            $object->setType($data->{'type'});
        }
        if (property_exists($data, 'items')) {
            $values = array();
            foreach ($data->{'items'} as $value) {
                $values[] = $this->serializer->deserialize(json_encode($value), DirectoryItemModel::class, 'json', $context);
            }
            $object->setItems($values);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getType()) {
            $data->{'type'} = $object->getType();
        }
        if (null !== $object->getItems()) {
            $values = array();
            foreach ($object->getItems() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'items'} = $values;
        }
        return $data;
    }
}