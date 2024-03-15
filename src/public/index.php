<?php
/**
 * Author: SULAIMAN
 * Email: sulaiman@sendajapan.com
 * Website: https://www.sulaimansan.com
 *
 * Description: Brief description of the code or file.
 *
 * Date: 2/28/2024
 */

declare(strict_types=1);

error_reporting(E_ERROR);
ini_set('display_errors', "1");

use App\Config;
use App\Controllers\CurlController;
use App\Controllers\HomeController;
use DI\Container;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Twig\Error\LoaderError;
use Twig\Extra\Intl\IntlExtension;

use function DI\create;

require __DIR__ . '/../vendor/autoload.php';
const VIEW_PATH = __DIR__ . '/../views';
const STORAGE_PATH = __DIR__ . '/../storage';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$container = new Container();
$container->set(Config::class, create(Config::class)->constructor($_ENV));
$container->set(EntityManager::class, fn(Config $config) => new EntityManager(
    DriverManager::getConnection($config->db),
    ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/../app/Entity'])
));

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->get('/', [HomeController::class, 'index']);
$app->get('/curl', [CurlController::class, 'index']);

try {
    $twig = Twig::create(VIEW_PATH, [
        'cache' => STORAGE_PATH . '/cache',
        'auto_reload' => true
    ]);

    $twig->addExtension(new IntlExtension());
    $app->add(TwigMiddleware::create($app, $twig));
} catch (LoaderError $e) {
    var_dump($e);
}

$app->run();