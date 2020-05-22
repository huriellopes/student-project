<?php

namespace App\Repositories\Users;

use App\Interfaces\Users\UsersRepositoryInterface;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class UsersRepository implements UsersRepositoryInterface
{

    /**
     * @return Collection
     */
    public function listUsers(): Collection
    {
        return User::all();
    }

    /**
     * @param stdClass $params
     * @return User
     */
    public function createUser(stdClass $params): User
    {
        $user = new User();
        $user->name = $params->name;
        $user->email = $params->email;
        $user->save();

        return $user;
    }

    /**
     * @param User $user
     * @return User
     */
    public function getUser(User $user) : User
    {
        return User::where('id', $user->id)->first();
    }

    /**
     * @param User $user
     * @param stdClass $params
     * @return User
     */
    public function updateUser(User $user, stdClass $params): User
    {
        $User = $this->getUser($user);

        $User->fill([
            'name' => $params->name,
            'email' => $params->email
        ]);

        $User->save();
        $User->refresh();

        return $User;
    }

    /**
     * @param User $user
     * @return User
     */
    public function deleteUser(User $user): User
    {
        $user->delete();

        return $user;
    }
}
