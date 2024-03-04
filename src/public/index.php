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
error_reporting(E_ALL);
ini_set('display_errors', "1");

use App\Application;
use App\controllers\HomeController;
use App\Exception\RouteNotFoundException;
use App\Router;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

const VIEW_PATH = __DIR__ . '/../views';

$router = new Router();

$router->get("/", [HomeController::class, 'index']);

try {
    (new Application($router))->run();
} catch (RouteNotFoundException $e) {
    echo "<pre>";
    print_r($e->getTrace());
    echo "<pre>";
}