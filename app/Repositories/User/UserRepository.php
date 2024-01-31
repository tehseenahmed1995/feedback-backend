<?php

namespace App\Repositories\User;

use App\Exceptions\InvalidDataException;
use App\Models\User;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository
{

    /**
     * create or update user details
     *
     * @param $data
     *
     * @return mixed
     */
    public function createOrUpdate($data)
    {
        return User::updateOrCreate(['email' => $data['email']], $data);
    }

    
    /**
     * This method return the user model instance by id if exists
     *
     * @param $id
     *
     * @param $relations
     *
     * @return mixed
     */
    public function getUserById($id, $relations = [])
    {
        return User::where('id', $id)->with($relations)->first();
    }

    /**
     * This method return the user model instance by email if exists
     *
     * @param $email
     * @param array $relations
     *
     * @return mixed
     */
    public function getUserByEmail($email, $relations = [])
    {
        return User::where('email', $email)->with($relations)->first();
    }

    /**
     * This method return all the users
     *
     * @param $email
     * @param array $relations
     *
     * @return mixed
     */
    public function getAllUsers()
    {
        return User::all();
    }

}
