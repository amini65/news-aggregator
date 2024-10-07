<?php

namespace App\Repositories;

use App\Models\User;

class UserRepo
{
    private $model;
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getUserByEmail($email)
    {
      return  $this->model::where('email',$email)->first();
    }

    public function resetPassword($user, $password)
    {
        $user->update([
            'password' => $password
        ]);
    }

}
