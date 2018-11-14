<?php

namespace SmartCat\Client\Normalizer;

class SegmentModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\SegmentModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\SegmentModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\SegmentModel();
        if (property_exists($data, 'text')) {
            $object->setText($data->{'text'});
        }
        if (property_exists($data, 'prevContext')) {
            $object->setPrevContext($data->{'prevContext'});
        }
        if (property_exists($data, 'nextContext')) {
            $object->setNextContext($data->{'nextContext'});
        }
        if (property_exists($data, 'tags')) {
            $values = array();
            foreach ($data->{'tags'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCat\\Client\\Model\\SegmentTagModel', 'raw', $context);
            }
            $object->setTags($values);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getText()) {
            $data->{'text'} = $object->getText();
        }
        if (null !== $object->getPrevContext()) {
            $data->{'prevContext'} = $object->getPrevContext();
        }
        if (null !== $object->getNextContext()) {
            $data->{'nextContext'} = $object->getNextContext();
        }
        if (null !== $object->getTags()) {
            $values = array();
            foreach ($object->getTags() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'tags'} = $values;
        }
        return $data;
    }
}