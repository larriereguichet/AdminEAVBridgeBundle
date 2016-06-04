<?php

namespace LAG\AdminEAVBridgeBundle\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use PHPUnit_Framework_TestCase;
use stdClass;

class DoctrineEAVRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function testSave()
    {
        $entity = new stdClass();
        $em = $this
            ->getMockBuilder(EntityManagerInterface::class)
            ->getMock();
        $em
            ->expects($this->once())
            ->method('persist')
            ->with($entity);
        $em
            ->expects($this->once())
            ->method('flush');


        $repository = new DoctrineEAVRepository($em, new ClassMetadata('TestClass'));
        $repository->save($entity);
    }

    public function testRemove()
    {
        $entity = new stdClass();
        $em = $this
            ->getMockBuilder(EntityManagerInterface::class)
            ->getMock();
        $em
            ->expects($this->once())
            ->method('remove')
            ->with($entity);
        $em
            ->expects($this->once())
            ->method('flush');


        $repository = new DoctrineEAVRepository($em, new ClassMetadata('TestClass'));
        $repository->delete($entity);
    }
}
