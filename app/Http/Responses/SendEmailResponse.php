<?php

namespace App\Http\Responses;

use App\Contracts\BaseResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Fortify;
use Symfony\Component\HttpFoundation\Response;

class SendEmailResponse implements BaseResponse
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
            response()->json([
                'message' => 'Email verification sent'
            ]);
        }

        return back()->with('status', Fortify::VERIFICATION_LINK_SENT);
    }
}
