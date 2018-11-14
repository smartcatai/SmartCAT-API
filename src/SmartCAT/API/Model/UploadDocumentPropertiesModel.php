<?php

namespace SmartCat\Client\Model;

class UploadDocumentPropertiesModel
{
    /**
     * @var BilingualFileImportSettingsModel
     */
    protected $bilingualFileImportSettings;
    /**
     * @var bool
     */
    protected $enablePlaceholders;
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