<?php

declare(strict_types=1);

namespace App\Enum;

enum HttpMethod: string
{
    case GET = 'get';
    case POST = 'post';
    case PUT = 'put';
    case HEAD = 'head';
}