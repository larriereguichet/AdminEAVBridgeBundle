<?php

namespace LAG\AdminEAVBridgeBundle\Tests\Event\Subscriber;

use LAG\AdminBundle\Event\AdminEvent;
use LAG\AdminEAVBridgeBundle\Event\Subscriber\EAVAdminConfigurationSubscriber;
use LAG\AdminEAVBridgeBundle\Mapping\AdminEAVFamilyMapper;
use PHPUnit_Framework_TestCase;

class EAVAdminConfigurationSubscriberTest extends PHPUnit_Framework_TestCase
{
    public function testAdminCreate()
    {
        $mapper = new AdminEAVFamilyMapper();
        $subscriber = new EAVAdminConfigurationSubscriber(
            [
                'test_admin' => 'test_family'
            ],
            $mapper
        );


        $subscribedEvents = $subscriber->getSubscribedEvents();
        $this->assertArrayHasKey(AdminEvent::ADMIN_CREATE, $subscribedEvents);
        $this->assertContains('adminCreate', $subscribedEvents);
        $subscriber->adminCreate(new AdminEvent());


        $event = new AdminEvent();
        $event->setAdminName('test_admin');
        $subscriber->adminCreate($event);
        $event->setConfiguration([
            'entity' => 'TestClass'
        ]);
        $subscriber->adminCreate($event);
        $this->assertEquals('test_admin', $mapper->getAdmin('TestClass'));
        $this->assertEquals('test_family', $mapper->getFamily('TestClass'));
    }
}
