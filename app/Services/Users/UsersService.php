<?php

namespace App\Services\Users;

use App\Interfaces\Users\UsersRepositoryInterface;
use App\Interfaces\Users\UsersServiceInterface;
use App\User;
use App\Validates\Users\UsersValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use Exception;

class UsersService implements UsersServiceInterface
{
    protected $UsersRepositoryInterface;
    protected $UsersValidate;

    public function __construct(UsersRepositoryInterface $UsersRepositoryInterface,
                                UsersValidate $UsersValidate)
    {
        $this->UsersRepositoryInterface = $UsersRepositoryInterface;
        $this->UsersValidate = $UsersValidate;
    }

    /**
     * @return Collection
     */
    public function listUsers(): Collection
    {
        return $this->UsersRepositoryInterface->listUsers();
    }

    /**
     * @param stdClass $params
     * @return User
     * @throws Exception
     */
    public function createUser(stdClass $params): User
    {
        $this->getValidate()->validaParametros($params);

        return $this->UsersRepositoryInterface->createUser($params);
    }

    /**
     * @param User $user
     * @param stdClass $params
     * @return User
     * @throws Exception
     */
    public function updateUser(User $user, stdClass $params): User
    {
        $this->getValidate()->validaParametros($params);

        return $this->UsersRepositoryInterface->updateUser($user, $params);
    }

    /**
     * @param User $user
     * @return User
     */
    public function deleteUser(User $user): User
    {
        return $this->UsersRepositoryInterface->deleteUser($user);
    }

    /**
     * @return UsersValidate
     */
    public function getValidate() : UsersValidate
    {
        return $this->UsersValidate;
    }
}
