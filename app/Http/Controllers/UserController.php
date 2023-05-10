<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AppUser;

class UserController
{
    public function create(Request $request)
    {
        $openid = $request->post("openid");
        $avatar = $request->post("avatar");
        $nickname = $request->post("nickname");

        $appUser = AppUser::where('openid', $openid)->first();
        if (empty($appUser)) {
            $appUser = new AppUser();

            $appUser->openid = $openid;
            $appUser->avatar = $avatar;
            $appUser->nickname = $nickname;
            $appUser->created_time = time();
            $appUser->save();
        }
        return [
            'user_id' => $appUser->id,
            'status' => $appUser->status
        ];
    }
}
