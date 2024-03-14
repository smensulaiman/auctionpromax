<?php

namespace App\Attributes;

use App\Enum\HttpMethod;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
class Get extends Route
{
    public function __construct(string $routePath)
    {
        parent::__construct($routePath, HttpMethod::GET);
    }
}