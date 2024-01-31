<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Utils\ResponseUtil;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
    * Register user
    *
    * @param  UserRegisterRequest $request
    * @return @return mixed
    */
    public function register(UserRegisterRequest $request)
    {
        $response = $this->authService->register($request->validated());
        if(!$response['error']) {
           return ResponseUtil::successWithMessage($response['message'],'data_saved', 201 );
        }
        return ResponseUtil::errorWithMessage($response['message']);
    }

    /**
    * Login user
    *
    * @param  UserLoginRequest $request
    * @return @return mixed
    */
    public function login(UserLoginRequest $request)
    {
        $response = $this->authService->login($request->validated());
        if(!$response['error']) {
           return ResponseUtil::successWithData($response['data'], 'user_login', 200 );
        }
        return ResponseUtil::errorWithMessage($response['message'], '' , $response['error'] ?? 400);
    }

     /**
    * Login user
    *
    * @return @return mixed
    */
    public function logout()
    {
        $response = $this->authService->logout();
        if(!empty($response)) {
           return ResponseUtil::successWithMessage('Use Successfully logged out', 'user_logout');
        }
        return ResponseUtil::errorWithMessage('Error while logout', 'user_logout' );
    }

    /**
    * get all users 
    *
    * @return @return UserResource
    */
    public function list()
    {
        return UserResource::collection($this->authService->getAllUsers());  
    }
}
