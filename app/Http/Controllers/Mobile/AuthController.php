<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => ['required'],
            'password' => ['required'],
        ]);

        return $this->success([], 'Logged in Successfully');
    }
}
