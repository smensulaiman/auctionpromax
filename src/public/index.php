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

use Ramsey\Uuid\UuidFactory;

require __DIR__ . '/../vendor/autoload.php';

$uuidFactory = new UuidFactory();
echo $uuidFactory->uuid4();