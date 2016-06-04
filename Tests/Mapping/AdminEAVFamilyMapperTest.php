<?php

namespace LAG\AdminEAVBridgeBundle\Mapping;

use Exception;
use PHPUnit_Framework_TestCase;

class AdminEAVFamilyMapperTest extends PHPUnit_Framework_TestCase
{
    public function testMapper()
    {
        $mapper = new AdminEAVFamilyMapper();
        $mapper->addMapping('TestClass', 'test_admin', 'test_family');
        $this->assertEquals('test_admin', $mapper->getAdmin('TestClass'));
        $this->assertEquals('test_family', $mapper->getFamily('TestClass'));

        $message = '';
        try {
            $mapper->getAdmin('wrong');
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        $this->assertEquals('wrong not found in Admin EAV bridge mapping. Check your configuration', $message);

        $message = '';
        try {
            $mapper->getFamily('wrong');
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        $this->assertEquals('wrong not found in Admin EAV bridge mapping. Check your configuration', $message);
    }
}
