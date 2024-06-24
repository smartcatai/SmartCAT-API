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
        if (isset($data['id'])) {
            $object->setId($data['id']);
        }
        if (isset($data['name'])) {
            $object->setName($data['name']);
        }
        if (isset($data['description'])) {
            $object->setDescription($data['description']);
        }
        if (isset($data['deadline'])) {
            $object->setDeadline($data['deadline']);
        }
        if (isset($data['creationDate'])) {
            $object->setCreationDate($data['creationDate']);
        }
        if (isset($data['createdByUserId'])) {
            $object->setCreatedByUserId($data['createdByUserId']);
        }
        if (isset($data['modificationDate'])) {
            $object->setModificationDate($data['modificationDate']);
        }
        if (isset($data['sourceLanguage'])) {
            $object->setSourceLanguage($data['sourceLanguage']);
        }
        if (isset($data['targetLanguages'])) {
            $values = array();
            foreach ($data['targetLanguages'] as $value) {
                $values[] = $value;
            }
            $object->setTargetLanguages($values);
        }
        if (isset($data['status'])) {
            $object->setStatus($data['status']);
        }
        if (isset($data['statusModificationDate'])) {
            $object->setStatusModificationDate($data['statusModificationDate']);
        }
        if (isset($data['domainId'])) {
            $object->setDomainId($data['domainId']);
        }
        if (isset($data['clientId'])) {
            $object->setClientId($data['clientId']);
        }
        if (isset($data['vendors'])) {
            $values_3 = array();
            foreach ($data['vendors'] as $value_3) {
                $values_3[] = $this->serializer->deserialize(json_encode($value_3), ProjectVendorModel::class, 'json', $context);
            }
            $object->setVendors($values_3);
        }
        if (isset($data['workflowStages'])) {
            $values_1 = array();
            foreach ($data['workflowStages'] as $value_1) {
                $values_1[] = $this->serializer->deserialize(json_encode($value_1), ProjectWorkflowStageModel::class, 'json', $context);
            }
            $object->setWorkflowStages($values_1);
        }
        if (isset($data['documents'])) {
            $values_2 = array();
            foreach ($data['documents'] as $value_2) {
                $values_2[] = $this->serializer->deserialize(json_encode($value_2), DocumentModel::class, 'json', $context);
            }
            $object->setDocuments($values_2);
        }
        if (isset($data['externalTag'])) {
            $object->setExternalTag($data['externalTag']);
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
