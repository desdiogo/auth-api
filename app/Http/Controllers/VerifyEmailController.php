<?php

namespace App\Http\Controllers;

use App\Http\Responses\VerifyEmailResponse;
use Illuminate\Auth\Events\Verified;
use Laravel\Fortify\Http\Controllers\VerifyEmailController as BaseController;
use Laravel\Fortify\Http\Requests\VerifyEmailRequest;

class VerifyEmailController extends BaseController
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param VerifyEmailRequest $request
     * @return VerifyEmailResponse
     */
    public function __invoke(VerifyEmailRequest $request): VerifyEmailResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return app(VerifyEmailResponse::class);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return app(VerifyEmailResponse::class);
    }
}
