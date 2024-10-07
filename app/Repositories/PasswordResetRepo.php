<?php

namespace App\Repositories;

use App\Models\PasswordReset;

class PasswordResetRepo
{

    private $model;
    public function __construct(PasswordReset $passwordReset)
    {
        $this->model = $passwordReset;
    }

    public function getUserByEmail($email)
    {
        return  $this->model::where('email',$email)->first();
    }

    public function create($email,$token)
    {
        return  $this->model::create([
            'email' => $email,
            'token' => $token
        ]);
    }

    public function update($email,$token)
    {
        $model=$this->getUserByEmail($email);

        return $model->update([
            'email' => $email,
            'token' => $token
        ]);
    }

    public function delete($model)
    {
        $model->delete();
    }


}
