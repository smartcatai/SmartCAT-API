<?php

namespace SmartCAT\API\Model;

class UploadDocumentPropertiesModel
{
    /**
     * @var BilingualFileImportSettingsModel
     */
    protected $bilingualFileImportSettings;
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
}