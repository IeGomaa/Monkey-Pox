<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminUserInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\User\UserTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserRepository implements AdminUserInterface
{
    private $userModel;
    use ApiResponseTrait, UserTrait;
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function index()
    {
        $users = $this->getUsers();
        return $this->apiResponse(200, 'Users Data', null, $users);
    }

    public function account()
    {
        return $this->apiResponse(200, 'User Account', null, auth()->user());
    }

    public function create($request)
    {
        $user = $this->userModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return $this->apiResponse(200, 'User Was Created Successfully', null, $user);
    }

    public function delete($request)
    {
        $this->findUser($request->id)->delete();
        return $this->apiResponse(200, 'User Was Deleted Successfully');
    }

    public function update($request)
    {
        $this->findUser($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return $this->apiResponse(200, 'User Was Updated Successfully');
    }
}
