<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminAuthInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Models\User;

class AdminAuthRepository implements AdminAuthInterface
{
    private $userModel;
    use ApiResponseTrait;
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function login($request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = auth()->attempt($credentials);
        if (! $token) {
            return $this->apiResponse(401, 'Unauthorized');
        }
        return $this->createToken($token);
    }

    public function logout()
    {
        auth()->logout();
        return $this->apiResponse(200, 'Logout Successfully');
    }

    private function createToken($token)
    {
        $data = [
            'token' => $token,
            'user' => auth()->user()
        ];
        return $this->apiResponse(200, 'User Login Successfully', null, $data);
    }
}
