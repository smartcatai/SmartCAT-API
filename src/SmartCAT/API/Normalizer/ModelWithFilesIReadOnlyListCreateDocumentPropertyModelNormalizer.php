<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ModelWithFilesIReadOnlyListCreateDocumentPropertyModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\ModelWithFilesIReadOnlyListCreateDocumentPropertyModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\ModelWithFilesIReadOnlyListCreateDocumentPropertyModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\ModelWithFilesIReadOnlyListCreateDocumentPropertyModel();
        if (property_exists($data, 'Value')) {
            $values = array();
            foreach ($data->{'Value'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCAT\\API\\Model\\CreateDocumentPropertyModel', 'raw', $context);
            }
            $object->setValue($values);
        }
        if (property_exists($data, 'Files')) {
            $values_1 = array();
            foreach ($data->{'Files'} as $value_1) {
                $values_1[] = $this->serializer->deserialize($value_1, 'SmartCAT\\API\\Model\\UploadedFile', 'raw', $context);
            }
            $object->setFiles($values_1);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getValue()) {
            $values = array();
            foreach ($object->getValue() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'Value'} = $values;
        }
        if (null !== $object->getFiles()) {
            $values_1 = array();
            foreach ($object->getFiles() as $value_1) {
                $values_1[] = $this->serializer->serialize($value_1, 'raw', $context);
            }
            $data->{'Files'} = $values_1;
        }
        return $data;
    }
}