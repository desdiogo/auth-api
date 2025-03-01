<?php

namespace App\Http\Responses;

use App\Contracts\BaseResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class VerifyEmailResponse implements BaseResponse
{
    /**
     * Create an HTTP response that represent the object.
     *
     * @param $request
     * @return RedirectResponse|Response
     */
    public function toResponse($request): RedirectResponse|Response
    {

        if($request->wantsJson()) {
            return response()->json([
                'message' => Lang::get('Email verified successfully')
            ]);
        }

        return response()->noContent();
    }
}
