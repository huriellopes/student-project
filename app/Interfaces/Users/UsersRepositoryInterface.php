<?php

namespace App\Interfaces\Users;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface UsersRepositoryInterface
{
    /**
     * @return Collection
     */
    public function listUsers() : Collection;

    /**
     * @param stdClass $params
     * @return User
     */
    public function createUser(stdClass $params) : User;

    /**
     * @param User $user
     * @return User
     */
    public function getUser(User $user) : User;

    /**
     * @param User $user
     * @param stdClass $params
     * @return User
     */
    public function updateUser(User $user, stdClass $params) : User;

    /**
     * @param User $user
     * @return User
     */
    public function deleteUser(User $user) : User;
}
