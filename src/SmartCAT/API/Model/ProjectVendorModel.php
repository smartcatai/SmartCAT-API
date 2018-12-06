<?php

namespace SmartCat\Client\Model;

class ProjectVendorModel
{
    /**
     * @var string
     */
    protected $vendorAccountId;

    /**
     * @var boolean
     */
    protected $removedFromProject;

    /**
     * @return string
     */
    public function getVendorAccountId()
    {
        return $this->vendorAccountId;
    }

    /**
     * @param string $vendorAccountId
     *
     * @return self
     */
    public function setVendorAccountId($vendorAccountId = null)
    {
        $this->vendorAccountId = $vendorAccountId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getRemovedFromProject()
    {
        return $this->removedFromProject;
    }

    /**
     * @param boolean $removedFromProject
     *
     * @return self
     */
    public function setRemovedFromProject($removedFromProject = null)
    {
        $this->removedFromProject = $removedFromProject;
        return $this;
    }
}
