<?php

namespace App\Repository;
use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;



use App\Models\Base;

/**
 * Class BaseRepository
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
      
        
    }

    public function create(array $payLoad = []) {
        $model = $this->model->create($payLoad);
        return $model->fresh();

    }



    public function all() {
        return $this->model->all();
    }

    public function findById(
        int $modelId,
        array $column = ['*'],
        array $relation =[]
    ){
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }

}
