<?php

namespace JK\AdminEAVBridgeBundle\Tests\DependencyInjection;

use LAG\AdminEAVBridgeBundle\DependencyInjection\Configuration;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Config\Definition\NodeInterface;

class ConfigurationTest extends PHPUnit_Framework_TestCase
{
    public function testGetTreeBuilder()
    {
        $configuration = new Configuration();
        $builder = $configuration->getConfigTreeBuilder();
        $tree = $builder->buildTree();

        $this->assertInstanceOf(NodeInterface::class, $tree);
    }
}
