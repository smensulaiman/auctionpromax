<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use Doctrine\DBAL\Exception;

class User extends Model
{
    private string|array|false $result = "";

    public function create(string $email, string $name, bool $isActive = true): ?User
    {
        return new User();
    }

    public function findByEmail(string $email): array|false|string
    {
        try {
            $this->result = $this->db->createQueryBuilder()
                ->select('full_name')
                ->from('users')
                ->where('email = ?')
                ->setParameter(0, $email)
                ->fetchAssociative();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $this->result;
    }

}