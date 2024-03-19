<?php

namespace App\services;

use App\Entity\UserEntity;
use Doctrine\ORM\EntityManager;

class UserService
{

    public function __construct(private readonly EntityManager $em)
    {
    }

    public function getUser(string $email): array
    {
        return [
            'name' => 'sulaiman'
        ];
        //return $this->em->createQueryBuilder()
        //    ->select('tbl_user.fullName')
        //    ->from(UserEntity::class, 'tbl_user')
        //    ->where('tbl_user.email = :email')
        //    ->setParameter('email', $email)
        //    ->getQuery()
        //    ->getArrayResult();
    }

}