<?php

namespace LAG\AdminEAVBridgeBundle\Tests\DependencyInjection;

use LAG\AdminEAVBridgeBundle\DependencyInjection\LAGAdminEAVBridgeExtension;
use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;

class LAGAdminEAVBridgeExtensionTest extends PHPUnit_Framework_TestCase
{
    /**
     * {@inheritdoc}
     */
    public function testLoad()
    {
        $extension = new LAGAdminEAVBridgeExtension();
        $extension->load([
            'lag_admin_eav_bridge' => [
                'entity' => 'test',
                'mapping' => [],
            ],
        ], new ContainerBuilder());
    }
}
