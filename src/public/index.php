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

use Slim\App;

$container = require '../bootstrap.php';

$container->get(App::class)->run();