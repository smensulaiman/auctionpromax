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

use App\Application;
use App\Config;
use App\Router;

require __DIR__ . '/../vendor/autoload.php';
const VIEW_PATH = __DIR__ . '/../views';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$data = array(
    "name" => "sulaiman",
    "email" => "smensulaiman007@gmail.com",
    "password" => "sulaiman007"
    );

var_dump($data);

$router = new Router();

$dbConfig = new Config($_ENV);

(new Application(
    $router,
    [
        'uri' => $_SERVER['REQUEST_URI'],
        'method' => $_SERVER['REQUEST_METHOD']
    ],
    $dbConfig
))->run();
