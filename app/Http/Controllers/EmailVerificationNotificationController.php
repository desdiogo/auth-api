<?php

namespace App\Http\Controllers;


use App\Http\Responses\HasEmailResponse;
use App\Http\Responses\SendEmailResponse;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController as BaseController;

class EmailVerificationNotificationController extends BaseController
{
    /**
     * @param Request $request
     * @return HasEmailResponse|SendEmailResponse|Application|JsonResponse|Response|mixed|object
     */
    public function store(Request $request): mixed
    {
        if($request->user()->hasVerifiedEmail()) {
            return app(HasEmailResponse::class);
        }

        $request->user()->sendEmailVerificationNotification();

        return app(SendEmailResponse::class);
    }
}
