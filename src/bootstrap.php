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

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/configs/path_constants.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create Container using PHP-DI
return require CONFIG_PATH . '/container/container.php';
