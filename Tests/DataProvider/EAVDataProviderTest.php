<?php

namespace JK\AdminEAVBridgeBundle\Tests\DataProvider;

require_once __DIR__.'/../EAVFamily.php';
require_once __DIR__.'/../EAVTestEntity.php';

use Exception;
use JK\AdminEAVBridgeBundle\Tests\EAVFamily;
use JK\AdminEAVBridgeBundle\Tests\EAVTestEntity;
use LAG\AdminBundle\Repository\RepositoryInterface;
use LAG\AdminEAVBridgeBundle\DataProvider\EAVDataProvider;
use LAG\AdminEAVBridgeBundle\Mapping\AdminEAVFamilyMapper;
use PHPUnit_Framework_TestCase;
use Sidus\EAVModelBundle\Configuration\FamilyConfigurationHandler;

class EAVDataProviderTest extends PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $repository = $this
            ->getMockBuilder(RepositoryInterface::class)
            ->getMock();

        $repository
            ->method('getClassName')
            ->willReturn(EAVTestEntity::class);
        $mapper = $this
            ->getMockBuilder(AdminEAVFamilyMapper::class)
            ->getMock();
        $mapper
            ->method('getFamily')
            ->willReturn('test');

        $handler = $this
            ->getMockBuilder(FamilyConfigurationHandler::class)
            ->getMock();
        $handler
            ->method('getFamily')
            ->willReturn(new EAVFamily());
        $handler
            ->method('hasFamily')
            ->willReturn(true);

        $dataProvider = new EAVDataProvider(
            $repository,
            $mapper,
            $handler
        );
        $entity = $dataProvider->create();
        $this->assertInstanceOf(EAVTestEntity::class, $entity);


        $handler = $this
            ->getMockBuilder(FamilyConfigurationHandler::class)
            ->getMock();
        $handler
            ->method('getFamily')
            ->willReturn(new EAVFamily());
        $handler
            ->method('hasFamily')
            ->willReturn(false);

        $dataProvider = new EAVDataProvider(
            $repository,
            $mapper,
            $handler
        );
        $message = '';

        try {
            $dataProvider->create();
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        $this->assertEquals('test not found in in family handler. Check your mapping configuration', $message);
    }
}
