<?php

namespace SmartCat\Client\Normalizer;

class CallbackPropertyModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\CallbackPropertyModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\CallbackPropertyModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\CallbackPropertyModel();
        if (isset($data['url'])) {
            $object->setUrl($data['url']);
        }
        if (isset($data['additionalHeaders'])) {
            $values = array();
            foreach ($data['additionalHeaders'] as $value) {
                $values[] = $this->serializer->deserialize(json_encode($value), 'SmartCat\\Client\\Model\\AdditionalHeaderModel', 'json', $context);
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
