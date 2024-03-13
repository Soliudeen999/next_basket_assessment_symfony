<?php

namespace App\Event;

use App\Entity\User;
use Symfony\Contracts\EventDispatcher\Event;

class UserCreatedEvent extends Event
{
    public const NAME = 'user.created';

    public function __construct(public User $user)
    {
        // dd($user);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function __toString(): string
    {
        return sprintf('User ID: %s', $this->user->getId());
    }
}