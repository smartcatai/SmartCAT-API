<?php

namespace SmartCat\Client\Normalizer;

use Carbon\Carbon;

class CallbackErrorModelNormalizer extends AbstractNormalizer
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCat\\Client\\Model\\CallbackErrorModel') {
            return false;
        }
        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCat\Client\Model\CallbackErrorModel) {
            return true;
        }
        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\CallbackErrorModel();
        if (isset($data['created'])) {
            $object->setCreated($data['created']);
        }
        if (isset($data['url'])) {
            $object->setUrl($data['url']);
        }
        if (isset($data['reason'])) {
            $object->setReason($data['reason']);
        }
        if (isset($data['code'])) {
            $object->setCode($data['code']);
        }
        if (isset($data['content'])) {
            $object->setContent($data['content']);
        }
        if (isset($data['sourceIds'])) {
            $values = array();
            foreach ($data['sourceIds'] as $value) {
                $values[] = $value;
            }
            $object->setSourceIds($values);
        }
        return $object;
    }

    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getCreated()) {
            $data->{'created'} = Carbon::parse($object->getCreated())->toISOString();
        }
        if (null !== $object->getUrl()) {
            $data->{'url'} = $object->getUrl();
        }
        if (null !== $object->getReason()) {
            $data->{'reason'} = $object->getReason();
        }
        if (null !== $object->getCode()) {
            $data->{'code'} = $object->getCode();
        }
        if (null !== $object->getContent()) {
            $data->{'content'} = $object->getContent();
        }
        if (null !== $object->getSourceIds()) {
            $values = array();
            foreach ($object->getSourceIds() as $value) {
                $values[] = $value;
            }
            $data->{'sourceIds'} = $values;
        }
        return $data;
    }
}
