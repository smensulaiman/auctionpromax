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

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$app = require '../bootstrap.php';
$container = $app->getContainer();

$router = require CONFIG_PATH . '/routes/web.php';
$router($app);

$app->add(TwigMiddleware::create($app, $container->get(Twig::class)));
$app->run();
