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

        $credentials = $request->only('phone_number', 'password');

    
        try {
            // Use the 'customer' guard
            if (!$token = auth('customer')->attempt($credentials)) {
                return $this->error([], 'Invalid credentials', 401);
            }
        } catch (JWTException $e) {
            return $this->error([], 'Could not create token', 500);
        }

        // $customer = Customer::where('id', 2291)->firstOrFail();

        return $this->success($token, 'Logged in Successfully');
    }

     // Logout customer
     public function logout()
     {
         auth('customer')->logout(true);
         return $this->success([], 'Successfully logged out');
     }

}