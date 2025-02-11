<?php

namespace App\Repository;
use App\Repository\Interfaces\UserRepositoryInterface;



use App\Models\User;

/**
 * Class UserRepository
 * @package App\Services
 */
class UserRepository implements UserRepositoryInterface
{
    public function getAllPaginate()
    {
        return User::paginate(14);;
        
    }
}
