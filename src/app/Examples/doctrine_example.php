<?php
/**
 * Author: SULAIMAN
 * Email: sulaiman@sendajapan.com
 * Website: https://www.sulaimansan.com
 *
 * Description: Brief description of the code or file.
 *
 * Date: 3/7/2024
 */

declare(strict_types=1);

use App\Entity\UserEntity;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require __DIR__ . '/../../vendor/autoload.php';
const VIEW_PATH = __DIR__ . '/../../views';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

$connectionParams = [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => 'localhost',
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql'
];

$entityManager = new EntityManager(
    DriverManager::getConnection($connectionParams),
    ORMSetup::createAttributeMetadataConfiguration(
        paths: array(__DIR__ . '/../Entity')
    )
);

$queryBuilder = $entityManager->createQueryBuilder();

$userQuery = $queryBuilder
    ->select('u')
    ->from(UserEntity::class, 'u')
    ->where('u.email = :email')
    ->setParameter('email', 'sulaiman@sendajapan.com')
    ->getQuery();

$userEntityList = $userQuery->getResult();

foreach ($userEntityList as $userEntity){
    echo $userEntity->getFullName();
}