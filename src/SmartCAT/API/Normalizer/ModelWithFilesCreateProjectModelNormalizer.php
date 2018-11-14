<?php

namespace SmartCat\Client\Normalizer;

class ModelWithFilesCreateProjectModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\ModelWithFilesCreateProjectModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\ModelWithFilesCreateProjectModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\ModelWithFilesCreateProjectModel();
        if (property_exists($data, 'Value')) {
            $object->setValue($this->serializer->deserialize($data->{'Value'}, 'SmartCat\\Client\\Model\\CreateProjectModel', 'raw', $context));
        }
        if (property_exists($data, 'Files')) {
            $values = array();
            foreach ($data->{'Files'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCat\\Client\\Model\\UploadedFile', 'raw', $context);
            }
            $object->setFiles($values);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getValue()) {
            $data->{'Value'} = $this->serializer->serialize($object->getValue(), 'raw', $context);
        }
        if (null !== $object->getFiles()) {
            $values = array();
            foreach ($object->getFiles() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'Files'} = $values;
        }
        return $data;
    }
}