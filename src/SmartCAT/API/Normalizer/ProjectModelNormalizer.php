<?php

namespace SmartCat\Client\Normalizer;

use Carbon\Carbon;
use SmartCat\Client\Model\DocumentModel;
use SmartCat\Client\Model\ProjectModel;
use SmartCat\Client\Model\ProjectVendorModel;
use SmartCat\Client\Model\ProjectWorkflowStageModel;

class ProjectModelNormalizer extends AbstractNormalizer
{
    /**
     * @param mixed $data
     * @param string $type
     * @param null $format
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== ProjectModel::class) {
            return false;
        }
        return true;
    }

    /**
     * @param mixed $data
     * @param null $format
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof ProjectModel) {
            return true;
        }
        return false;
    }

    /**
     * @param mixed $data
     * @param string $class
     * @param null $format
     * @param array $context
     * @return object|ProjectModel
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCat\Client\Model\ProjectModel();
        $data = (array) $data;
        $properties = ['id', 'name', 'description', 'deadline', 'creationDate', 'createdByUserId', 'modificationDate', 'sourceLanguage', 'targetLanguages', 'status', 'statusModificationDate', 'domainId', 'clientId', 'vendors', 'workflowStages', 'documents', 'externalTag'];

        foreach ($properties as $property) {
            if (isset($data[$property])) {
                if (is_array($data[$property])) {                    
                    $values = [];
                    foreach ($data[$property] as $value) {                        
                        if ($property == 'vendors') {                            
                            $values[] = $this->serializer->deserialize(json_encode($value), ProjectVendorModel::class, 'json', $context);
                        } elseif ($property == 'workflowStages') {
                            $values[] = $this->serializer->deserialize(json_encode($value), ProjectWorkflowStageModel::class, 'json', $context);
                        } elseif ($property == 'documents') {
                            $values[] = $this->serializer->deserialize(json_encode($value), DocumentModel::class, 'json', $context);
                        } else {
                            $values[] = $value;
                        }
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

    /**
     * @param $object ProjectModel
     * @param null $format
     * @param array $context
     * @return \stdClass
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getDeadline()) {
            $data->{'deadline'} = Carbon::parse($object->getDeadline())->toISOString();
        }
        if (null !== $object->getCreationDate()) {
            $data->{'creationDate'} = Carbon::parse($object->getCreationDate())->toISOString();
        }
        if (null !== $object->getCreatedByUserId()) {
            $data->{'createdByUserId'} = $object->getCreatedByUserId();
        }
        if (null !== $object->getModificationDate()) {
            $data->{'modificationDate'} = Carbon::parse($object->getModificationDate())->toISOString();
        }
        if (null !== $object->getSourceLanguage()) {
            $data->{'sourceLanguage'} = $object->getSourceLanguage();
        }
        if (null !== $object->getTargetLanguages()) {
            $values = array();
            foreach ($object->getTargetLanguages() as $value) {
                $values[] = $value;
            }
            $data->{'targetLanguages'} = $values;
        }
        if (null !== $object->getStatus()) {
            $data->{'status'} = $object->getStatus();
        }
        if (null !== $object->getStatusModificationDate()) {
            $data->{'statusModificationDate'} = Carbon::parse($object->getStatusModificationDate())->toISOString();
        }
        if (null !== $object->getDomainId()) {
            $data->{'domainId'} = $object->getDomainId();
        }
        if (null !== $object->getClientId()) {
            $data->{'clientId'} = $object->getClientId();
        }
        if (null !== $object->getVendors()) {
            $values_3 = array();
            foreach ($object->getVendors() as $value_3) {
                $values_3[] = $this->serializer->serialize($value_3, 'raw', $context);
            }
            $data->{'vendors'} = $values_3;
        }
        if (null !== $object->getWorkflowStages()) {
            $values_1 = array();
            foreach ($object->getWorkflowStages() as $value_1) {
                $values_1[] = $this->serializer->serialize($value_1, 'raw', $context);
            }
            $data->{'workflowStages'} = $values_1;
        }
        if (null !== $object->getDocuments()) {
            $values_2 = array();
            foreach ($object->getDocuments() as $value_2) {
                $values_2[] = $this->serializer->serialize($value_2, 'raw', $context);
            }
            $data->{'documents'} = $values_2;
        }
        if (null !== $object->getExternalTag()) {
            $data->{'externalTag'} = $object->getExternalTag();
        }
        return $data;
    }
}
