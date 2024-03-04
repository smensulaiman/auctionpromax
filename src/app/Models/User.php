<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class User extends Model
{
    public function create(string $email, string $name, bool $isActive = true): ?User
    {
        return new User();
    }

    public function findByEmail(string $email): mixed
    {
        $dbQuery = "SELECT * from users where email = ?";

        try {
            $this->db->beginTransaction();

            $preparedStatement = $this->db->prepare($dbQuery);
            $result = $preparedStatement->execute([$email]);

            $this->db->commit();
        } catch (\Exception $e) {
            echo $e->getMessage();
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
        }

        if ($result) {
            return $preparedStatement->fetch();
        } else {
            echo "not found";
        }

        return [];
    }

}