<?php

namespace Domain\User\Http\Controllers\Auth\Verification;

use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Support\Http\Controllers\AbstractController;

final class ProcessVerificationController extends AbstractController
{
    use VerifiesEmails;

    public function __invoke(Request $request)
    {
        return $this->verify($request);
    }
}
