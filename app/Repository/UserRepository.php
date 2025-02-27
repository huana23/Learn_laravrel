<?php

namespace App\Repository;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Repository\BaseRepository;



use App\Models\User;

/**
 * Class UserRepository
 * @package App\Services
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    protected $model;
    public function __construct(
        User $model
    ){
        $this->model = $model;
        
    }
    // public function getAllPaginate()
    // {
    //     return User::paginate(14);
        
    // }
}
