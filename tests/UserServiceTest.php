<?php

namespace App\Tests;

use App\Entity\User;
use App\Event\UserCreatedEvent;
use App\EventSubscriber\UserCreatedEventSubscriber;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UserServiceTest extends TestCase
{
    public function testSomething(): void
    {
        // Call the storeUser method with test data
        $user = new User();
        $user->setFirstname('John');
        $user->setLastname('Doe');
        $user->setEmail('johndoe@gmail.com');

        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $em = $this->createMock(EntityManagerInterface::class);
        $logger = $this->createMock(LoggerInterface::class);


        $userCreatedSubscriber = new UserCreatedEventSubscriber($logger);
        $eventDispatcher->addSubscriber($userCreatedSubscriber);


        // $logger->expects($this->once())
        //     ->method('info')
        //     ->with("User created: {$user->getFirstname()}");
        
        // Set up expectations for the dispatch method
        $eventDispatcher->expects($this->once())
            ->method('dispatch')
            ->with($this->isInstanceOf(UserCreatedEvent::class));

        // Create an instance of the UserService with the mock EventDispatcher
        $userService = new UserService($em, $eventDispatcher);
        
        $userService->storeUser($user);        
    }
}
