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

use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/container_bindings.php');
return $containerBuilder->build();