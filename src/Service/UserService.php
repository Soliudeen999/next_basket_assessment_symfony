<?php
namespace App\Service;

use App\Entity\User;
use App\Event\UserCreatedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UserService
{        
    public function __construct(
        private EntityManagerInterface $entityManager, 
        private EventDispatcherInterface $eventDispatcherInterface,
    ) {
        // 
    }

    /**
     * storeUser
     *
     * @param  mixed $data
     * @return User
     */
    public function storeUser(User $user) : User
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $this->eventDispatcherInterface->dispatch(new UserCreatedEvent($user));
        return $user;
    }
}