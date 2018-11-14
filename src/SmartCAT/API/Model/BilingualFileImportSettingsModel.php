<?php

namespace SmartCat\Client\Model;

class BilingualFileImportSettingsModel
{
    /**
     * @var string
     */
    protected $targetSubstitutionMode;
    /**
     * @var string
     */
    protected $lockMode;
    /**
     * @var string
     */
    protected $confirmMode;
    /**
     * @return string
     */
    public function getTargetSubstitutionMode()
    {
        return $this->targetSubstitutionMode;
    }
    /**
     * @param string $targetSubstitutionMode
     *
     * @return self
     */
    public function setTargetSubstitutionMode($targetSubstitutionMode = null)
    {
        $this->targetSubstitutionMode = $targetSubstitutionMode;
        return $this;
    }
    /**
     * @return string
     */
    public function getLockMode()
    {
        return $this->lockMode;
    }
    /**
     * @param string $lockMode
     *
     * @return self
     */
    public function setLockMode($lockMode = null)
    {
        $this->lockMode = $lockMode;
        return $this;
    }
    /**
     * @return string
     */
    public function getConfirmMode()
    {
        return $this->confirmMode;
    }
    /**
     * @param string $confirmMode
     *
     * @return self
     */
    public function setConfirmMode($confirmMode = null)
    {
        $this->confirmMode = $confirmMode;
        return $this;
    }
}