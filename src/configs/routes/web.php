<?php
/**
 * Author: SULAIMAN
 * Email: sulaiman@sendajapan.com
 * Website: https://www.sulaimansan.com
 *
 * Description: Brief description of the code or file.
 *
 * Date: 3/15/2024
 */

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\CurlController;
use App\Controllers\HomeController;
use Slim\App;

return function(App $app){
    $app->get('/', [HomeController::class, 'index']);
    $app->get('/curl', [CurlController::class, 'index']);

    $app->get('/login', [AuthController::class, 'loginView']);
    $app->get('/register', [AuthController::class, 'registerView']);
    $app->post('/login', [AuthController::class, 'logIn']);
    $app->post('/register', [AuthController::class, 'register']);
};
