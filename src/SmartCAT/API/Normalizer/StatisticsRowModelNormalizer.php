<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class StatisticsRowModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\StatisticsRowModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\StatisticsRowModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\StatisticsRowModel();
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'words')) {
            $object->setWords($data->{'words'});
        }
        if (property_exists($data, 'percent')) {
            $object->setPercent($data->{'percent'});
        }
        if (property_exists($data, 'segments')) {
            $object->setSegments($data->{'segments'});
        }
        if (property_exists($data, 'pages')) {
            $object->setPages($data->{'pages'});
        }
        if (property_exists($data, 'charsWithoutSpaces')) {
            $object->setCharsWithoutSpaces($data->{'charsWithoutSpaces'});
        }
        if (property_exists($data, 'charsWithSpaces')) {
            $object->setCharsWithSpaces($data->{'charsWithSpaces'});
        }
        if (property_exists($data, 'cost')) {
            $object->setCost($data->{'cost'});
        }
        if (property_exists($data, 'effectiveWordsForBilling')) {
            $object->setEffectiveWordsForBilling($data->{'effectiveWordsForBilling'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getWords()) {
            $data->{'words'} = $object->getWords();
        }
        if (null !== $object->getPercent()) {
            $data->{'percent'} = $object->getPercent();
        }
        if (null !== $object->getSegments()) {
            $data->{'segments'} = $object->getSegments();
        }
        if (null !== $object->getPages()) {
            $data->{'pages'} = $object->getPages();
        }
        if (null !== $object->getCharsWithoutSpaces()) {
            $data->{'charsWithoutSpaces'} = $object->getCharsWithoutSpaces();
        }
        if (null !== $object->getCharsWithSpaces()) {
            $data->{'charsWithSpaces'} = $object->getCharsWithSpaces();
        }
        if (null !== $object->getCost()) {
            $data->{'cost'} = $object->getCost();
        }
        if (null !== $object->getEffectiveWordsForBilling()) {
            $data->{'effectiveWordsForBilling'} = $object->getEffectiveWordsForBilling();
        }
        return $data;
    }
}