<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class CallbackPropertyModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\CallbackPropertyModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\CallbackPropertyModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\CallbackPropertyModel();
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'additionalHeaders')) {
            $values = array();
            foreach ($data->{'additionalHeaders'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCAT\\API\\Model\\AdditionalHeaderModel', 'raw', $context);
            }
            $object->setAdditionalHeaders($values);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getUrl()) {
            $data->{'url'} = $object->getUrl();
        }
        if (null !== $object->getAdditionalHeaders()) {
            $values = array();
            foreach ($object->getAdditionalHeaders() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'additionalHeaders'} = $values;
        }
        return $data;
    }
}