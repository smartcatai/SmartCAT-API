<?php

namespace SmartCat\Client\Model;

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
     * @var BilingualFileImportSettingsModel
     */
    protected $bilingualFileImportSettings;
    /**
     * @var string[]
     */
    protected $targetLanguages;
    /**
     * @var bool
     */
    protected $enablePlaceholders;
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
    /**
     * @return BilingualFileImportSettingsModel
     */
    public function getBilingualFileImportSettings()
    {
        return $this->bilingualFileImportSettings;
    }
    /**
     * @param BilingualFileImportSettingsModel $bilingualFileImportSettings
     *
     * @return self
     */
    public function setBilingualFileImportSettings(BilingualFileImportSettingsModel $bilingualFileImportSettings = null)
    {
        $this->bilingualFileImportSettings = $bilingualFileImportSettings;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getTargetLanguages()
    {
        return $this->targetLanguages;
    }
    /**
     * @param string[] $targetLanguages
     *
     * @return self
     */
    public function setTargetLanguages(array $targetLanguages = null)
    {
        $this->targetLanguages = $targetLanguages;
        return $this;
    }
    /**
     * @return bool
     */
    public function getEnablePlaceholders()
    {
        return $this->enablePlaceholders;
    }
    /**
     * @param bool $enablePlaceholders
     *
     * @return self
     */
    public function setEnablePlaceholders($enablePlaceholders = null)
    {
        $this->enablePlaceholders = $enablePlaceholders;
        return $this;
    }
}