<?php

namespace App\Services\Auth;

/**
 * Interface AuthService
 *
 * @package App\Services\Auth
 */
interface AuthService
{

    /**
     * Method to register user
     *
     * @param array $userRequest
     *
     * @return mixed
     */
    public function register(array $userRequest);

    /**
     * Method to login user
     *
     * @param array $userRequest
     *
     * @return mixed
     */
    public function login(array $userRequest);

    /**
     * Method to logout user
     *
     * @return mixed
     */
    public function logout();

    /**
     * Method to get all users
     *
     * @return mixed
     */
    public function getAllUsers();
}
