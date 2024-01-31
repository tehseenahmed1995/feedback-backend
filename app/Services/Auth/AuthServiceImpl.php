<?php

namespace App\Services\Auth;

use App\Repositories\User\UserRepository;
use App\Services\Auth\AuthService;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

/**
 * class AuthServiceImpl
 *
 * @package App\Services\FeedbackService
 */
class AuthServiceImpl implements AuthService {

    public function __construct(private UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Method to register user
     *
     * @param array $userRequest
     *
     * @return mixed
     */
    public function register(array $userRequest)
    {
        try {
            $user = $this->userRepository->createOrUpdate([
                'name'  => $userRequest['name'],
                'email' => $userRequest['email'],
                'password' => Hash::make($userRequest['password']),
            ]);

            if ($user) {
                return ['error' => false, 'message' => 'User Successfully created!'];
            }
        } catch (Exception $exception) {
            Log::error(json_encode(
                [
                    "message" => 'There was an error while user creation: ' . $exception->getMessage(),
                    "trace" => $exception->getTraceAsString()
                ],
                JSON_THROW_ON_ERROR
            ));

            return [
                'error' => true,
                'message' => 'There is an issue in user creation',
            ];
        }
    }

    /**
     * Method to login user
     *
     * @param array $userRequest
     *
     * @return mixed
     */
    public function login(array $userRequest)
    {
        try {
            if (!Auth::attempt($userRequest)) {
                return ['error' => true, 'message' => 'Unauthorized', 'status' => 401];
            }
            $user = auth()->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;
            return ['error' => false, 'data' => ['token_type' => 'Bearer', 'accessToken' =>$token]];
        } catch (Exception $exception) {
            Log::error(json_encode(
                [
                    "message" => 'There is an error while user login: ' . $exception->getMessage(),
                    "trace" => $exception->getTraceAsString()
                ],
                JSON_THROW_ON_ERROR
            ));

            return [
                'error' => true,
                'message' => 'There is an issue in user login',
            ];
        }
    }

    /**
     * Method to logout user
     *
     * @param Request $request
     * @return mixed
     */
    public function logout()
    {
        return request()->user()->tokens()->delete();
    }

    /**
     * Method to get all users
     *
     * @return mixed
     */
    public function getAllUsers()
    {
        try {
            return $this->userRepository->getAllUsers();
        } catch(Exception $exception) {
            Log::error(json_encode(
                [
                    "message" => 'There is user listing ' . $exception->getMessage(),
                    "trace" => $exception->getTraceAsString()
                ],
                JSON_THROW_ON_ERROR
            ));
            return false;
        } 
    }

}