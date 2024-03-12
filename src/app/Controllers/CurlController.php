<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\services\EmailValidatorService;

class CurlController
{
    private EmailValidatorService $emailValidatorService;
    public function __construct()
    {
        $this->emailValidatorService = new EmailValidatorService();
    }

    #[Get('/curl')]
    public function index(): string{
        $result = $this->emailValidatorService->verify(1);
        return json_encode($result);
    }

}