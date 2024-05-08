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
        $data = (array) $data;
        $properties = ['id', 'documentIds'];

        foreach ($properties as $property) {
            if (isset($data[$property])) {
                if (is_array($data[$property])) {                    
                    $values = [];
                    foreach ($data[$property] as $value) {                        
                        $values[] = $value;
                    }
                    $setter = 'set' . ucfirst($property);
                    $object->$setter($values);
                } else {
                    $setter = 'set' . ucfirst($property);
                    $object->$setter($data[$property]);
                }
            }
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