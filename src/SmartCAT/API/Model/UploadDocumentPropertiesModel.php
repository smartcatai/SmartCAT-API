<?php

namespace SmartCAT\API\Model;

class UploadDocumentPropertiesModel
{
    /**
     * @var BilingualFileImportSettings
     */
    protected $bilingualFileImportSettings;
    /**
     * @return BilingualFileImportSettings
     */
    public function getBilingualFileImportSettings()
    {
        return $this->bilingualFileImportSettings;
    }
    /**
     * @param BilingualFileImportSettings $bilingualFileImportSettings
     *
     * @return self
     */
    public function setBilingualFileImportSettings(BilingualFileImportSettings $bilingualFileImportSettings = null)
    {
        $this->bilingualFileImportSettings = $bilingualFileImportSettings;
        return $this;
    }
}