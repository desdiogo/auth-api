<?php

namespace App\Http\Responses;

use App\Contracts\BaseResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Fortify;
use Symfony\Component\HttpFoundation\Response;

class HasEmailResponse implements BaseResponse
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
               'message' => 'You email is already verified'
            ]);
        }

        return redirect()->intended(Fortify::redirects('email-verification'));
    }
}
