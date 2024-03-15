<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\ActiveStatus;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'users')]
class UserEntity
{
    #[Id]
    #[Column, GeneratedValue()]
    private int $id;

    #[Column]
    private string $email;

    #[Column(name: 'full_name', length: 255)]
    private string $fullName;

    #[Column(name: 'is_active')]
    private ActiveStatus $isActive;

    #[Column(name: 'created_at')]
    private DateTime $createdAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): UserEntity
    {
        $this->email = $email;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): UserEntity
    {
        $this->fullName = $fullName;
        return $this;
    }

    public function getIsActive(): ActiveStatus
    {
        return $this->isActive;
    }

    public function setIsActive(ActiveStatus $isActive): UserEntity
    {
        $this->isActive = $isActive;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): UserEntity
    {
        $this->createdAt = $createdAt;
        return $this;
    }

}