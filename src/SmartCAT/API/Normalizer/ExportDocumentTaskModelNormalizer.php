<?php

namespace SmartCat\Client\Normalizer;

class ExportDocumentTaskModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\ExportDocumentTaskModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\ExportDocumentTaskModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\ExportDocumentTaskModel();
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'documentIds')) {
            $values = array();
            foreach ($data->{'documentIds'} as $value) {
                $values[] = $value;
            }
            $object->setDocumentIds($values);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getDocumentIds()) {
            $values = array();
            foreach ($object->getDocumentIds() as $value) {
                $values[] = $value;
            }
            $data->{'documentIds'} = $values;
        }
        return $data;
    }
}