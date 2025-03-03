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
    public function pagination(array $column = ['*'], array $condition= [],array $join = [],array $extend = [],int $perPage = 1) {

        $query = $this->model->select($column)->where(function($query) use ($condition) {
            if(isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%')
                        ->orWhere('email', 'LIKE', '%'.$condition['keyword'].'%')
                        ->orWhere('phone', 'LIKE', '%'.$condition['keyword'].'%')
                        ->orWhere('address', 'LIKE', '%'.$condition['keyword'].'%');

            }
        });
        if(!empty($join)) {
            $query->$join(...$join);
        }
        return $query->paginate($perPage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }
}
