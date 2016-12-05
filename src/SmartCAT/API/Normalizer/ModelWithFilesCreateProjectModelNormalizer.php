<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ModelWithFilesCreateProjectModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\ModelWithFilesCreateProjectModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\ModelWithFilesCreateProjectModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\ModelWithFilesCreateProjectModel();
        if (property_exists($data, 'Value')) {
            $object->setValue($this->serializer->deserialize($data->{'Value'}, 'SmartCAT\\API\\Model\\CreateProjectModel', 'raw', $context));
        }
        if (property_exists($data, 'Files')) {
            $values = array();
            foreach ($data->{'Files'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCAT\\API\\Model\\UploadedFile', 'raw', $context);
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