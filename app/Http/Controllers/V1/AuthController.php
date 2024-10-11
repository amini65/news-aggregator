<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserResource;
use App\Repositories\PasswordResetRepo;
use App\Repositories\UserRepo;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class AuthController extends Controller
{
    private $repo;

    public function __construct(UserRepo $userRepo)
    {
        $this->repo=$userRepo;
    }

    public function login(UserLoginRequest $request){


        //If User email doesn't exist in system on credentials doesn't match ( can be seperated checks)
        $user=$this->repo->getUserByEmail( $request->email);

        if(!$user || !Hash::check($request->password,$user->password)){
            return Response::error([
                'message' => __('username_or_password_is_incorrect')
            ],404);
        }

        // Get Token for Authenticated User
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        // Create a response for Registered
        $loginResponse=[
            'user' => UserResource::make($user),
            'access_token' => $token,
        ];

        return Response::success($loginResponse,201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return Response::success([],'logged out',200);
    }

    /**
     * Perform a password reset
     *
     * @param ForgotPasswordRequest $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function forgot(ResetPasswordRequest $request): JsonResource
    {
        $resetRepo=new PasswordResetRepo();

        $user=$this->repo->getUserByEmail( $request->email);

        //if no such user exists then throw an error
        if(!$user || !$user->email){
            return Response::error(['No user with this email address','Incorrect Email Address Provided'],404);
        }

        //Generate a 4 digit random Token
        $resetPasswordToken = str_pad(random_int(1, 9999), 4, '0', STR_PAD_LEFT);

        // In Case User has already requested for forgot password don't create another record
        // Instead Update the existing token with the new token
        if(!$resetPasswordToken = $resetRepo->getUserByEmail($user->email)){
            // Store Token in DB with Token Expiration Time i.e: 1 hour
            $resetRepo->create($user->email,$resetPasswordToken);

        }else{
            // Store Token in DB with Token Expiration Time i.e: 1 hour
            $resetRepo->update($user->email,$resetPasswordToken);
        }

        return Response::success([],'A Code has been Sent to your Email Address.',200);

    }

    /**
     * Perform a password reset
     *
     * @param ResetPasswordRequest $request
     * @return JsonResource
     * @throws ValidationException
     */
    public function reset(ResetPasswordRequest $request): JsonResource
    {
        $resetRepo=new PasswordResetRepo();

        // Validate the request
        $attributes= $request->validated();

        $user= $this->repo->getUserByEmail( $attributes['email']);

        //Throw Exception if user is not found
        if(!$user){
            return Response::error('No Record Found','Incorrect Email Address Provided',404);
        }

        $resetRequest=$resetRepo->getUserByEmail($user->email);

        if(!$resetRequest || $resetRequest->token != $attributes['token']){
            return Response::error('An Error Occured . Please try again','Token mismatch',404);
        }

        // Update User's Password
        $this->repo->resetPassword($user,$attributes['password']);

        //Delete previous all Tokens
        $user->tokens()->delete();

        $resetRepo->delete($resetRequest);

        //Get Token for Authenticated User
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        // Create a response
        $loginResponse=[
            'user' => UserResource::make($user),
            'access_token' => $token,
        ];

        return Response::success($loginResponse,201);

    }
}
