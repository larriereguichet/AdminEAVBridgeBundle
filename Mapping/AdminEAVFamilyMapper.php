<?php

namespace LAG\AdminEAVBridgeBundle\Mapping;

use Exception;

class AdminEAVFamilyMapper
{
    /**
     * Admin names indexed by class
     *
     * @var array
     */
    protected $adminMapping = [];

    /**
     * EAV Families indexed by class
     *
     * @var array
     */
    protected $familyMapping = [];

    /**
     * @param string $class
     * @param string $admin
     * @param string $family
     */
    public function addMapping($class, $admin, $family)
    {
        $this->adminMapping[$class] = $admin;
        $this->familyMapping[$class] = $family;
    }

    /**
     * @param string $class
     * @return string
     * @throws Exception
     */
    public function getAdmin($class)
    {
        if (!array_key_exists($class, $this->adminMapping)) {
            throw new Exception($class.' not found in Admin EAV bridge mapping. Check your configuration');
        }

        return $this->adminMapping[$class];
    }

    /**
     * @param string $class
     * @return string
     * @throws Exception
     */
    public function getFamily($class)
    {
        if (!array_key_exists($class, $this->familyMapping)) {
            throw new Exception($class.' not found in Admin EAV bridge mapping. Check your configuration');
        }

        return $this->familyMapping[$class];
    }
}
