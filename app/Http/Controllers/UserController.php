<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return UserResource
     */
    public function get(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    public function avatar(Request $request)
    {

        $request->validate([
            'avatar' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:4096'
            ],
        ]);

        $extension = $request->file('avatar')->getClientOriginalExtension();
        $userId = $request->user()->id;
        $fileName = $userId . '.' . $extension;

        $path = $request->file('avatar')->storeAs('avatars', $fileName);

        return response()->json([
           "message" => "Avatar update",
            "avatar" => Storage::url($path)
        ]);
    }
}
