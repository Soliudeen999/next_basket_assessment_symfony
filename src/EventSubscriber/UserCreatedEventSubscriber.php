<?php

namespace App\EventSubscriber;

use App\Event\UserCreatedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Log\Logger;

class UserCreatedEventSubscriber implements EventSubscriberInterface
{
    public function __construct(private LoggerInterface $loggerInterface)
    {
        // 
    }

    public static function getSubscribedEvents(): array
    {
        return [
            UserCreatedEvent::class => 'onUserCreatedEvent',
        ];
    }

    public function onUserCreatedEvent($event): void
    {
        $user = $event->getUser();
        $this->loggerInterface->info("User created: {$user->getFirstname()}");
    }
}
