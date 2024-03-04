<?php

declare(strict_types=1);

namespace Exception;

class ViewNotFoundException extends \Exception
{
   protected $message = "View not found!";
}