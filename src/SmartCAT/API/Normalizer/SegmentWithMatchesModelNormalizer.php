<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class SegmentWithMatchesModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\SegmentWithMatchesModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\SegmentWithMatchesModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\SegmentWithMatchesModel();
        if (property_exists($data, 'sourceText')) {
            $object->setSourceText($data->{'sourceText'});
        }
        if (property_exists($data, 'targetText')) {
            $object->setTargetText($data->{'targetText'});
        }
        if (property_exists($data, 'segmentMatch')) {
            $object->setSegmentMatch($data->{'segmentMatch'});
        }
        if (property_exists($data, 'tags')) {
            $values = array();
            foreach ($data->{'tags'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SmartCAT\\API\\Model\\TagsFromUnit', 'raw', $context);
            }
            $object->setTags($values);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getSourceText()) {
            $data->{'sourceText'} = $object->getSourceText();
        }
        if (null !== $object->getTargetText()) {
            $data->{'targetText'} = $object->getTargetText();
        }
        if (null !== $object->getSegmentMatch()) {
            $data->{'segmentMatch'} = $object->getSegmentMatch();
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