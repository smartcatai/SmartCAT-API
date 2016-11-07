<?php

namespace SmartCAT\API\Model;

class CreateDocumentPropertyModel
{
    /**
     * @var string
     */
    protected $externalId;
    /**
     * @var string
     */
    protected $metaInfo;
    /**
     * @var string
     */
    protected $disassembleAlgorithmName;

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     *
     * @return self
     */
    public function setExternalId($externalId = null)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaInfo()
    {
        return $this->metaInfo;
    }

    /**
     * @param string $metaInfo
     *
     * @return self
     */
    public function setMetaInfo($metaInfo = null)
    {
        $this->metaInfo = $metaInfo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisassembleAlgorithmName()
    {
        return $this->disassembleAlgorithmName;
    }

    /**
     * @param string $disassembleAlgorithmName
     *
     * @return self
     */
    public function setDisassembleAlgorithmName($disassembleAlgorithmName = null)
    {
        $this->disassembleAlgorithmName = $disassembleAlgorithmName;
        return $this;
    }
}