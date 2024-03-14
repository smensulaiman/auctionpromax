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

use App\Controllers\HomeController;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Twig\Error\LoaderError;
use Twig\Extra\Intl\IntlExtension;

require __DIR__ . '/../vendor/autoload.php';
const VIEW_PATH = __DIR__ . '/../views';
const STORAGE_PATH = __DIR__ . '/../storage';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = AppFactory::create();

$app->get('/', [HomeController::class, 'index']);

try {
    $twig = Twig::create(VIEW_PATH, [
        'cache' => STORAGE_PATH . '/cache',
        'auto_reload' => true
    ]);
    $twig->addExtension(new IntlExtension());
    // Add Twig-View Middleware
    $app->add(TwigMiddleware::create($app, $twig));

} catch (LoaderError $e) {
    var_dump($e);
}

$app->run();