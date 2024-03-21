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
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use Slim\App;

return function(App $app){
    $app->get('/', [HomeController::class, 'index'])->add(AuthMiddleware::class);
    $app->get('/curl', [CurlController::class, 'index']);

    $app->get('/login', [AuthController::class, 'loginView'])->add(GuestMiddleware::class);
    $app->get('/register', [AuthController::class, 'registerView'])->add(GuestMiddleware::class);
    $app->post('/login', [AuthController::class, 'logIn'])->add(GuestMiddleware::class);
    $app->post('/register', [AuthController::class, 'register'])->add(GuestMiddleware::class);
    $app->post('/logout', [AuthController::class, 'logOut'])->add(GuestMiddleware::class);
};
