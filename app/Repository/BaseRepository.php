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

    public function update(int $id = 0, array $payLoad = []) {
        $model = $this->findById($id);
        return $model->update($payLoad);
    }

    public function updateByWhereIn(string $whereInField ='', array $whereIn= [], array $payload =[]) {
        return $this->model->whereIn($whereInField, $whereIn)->update($payload);
    }

    public function all() {
        return $this->model->all();
    }
    //xoá mềm vẫn còn lưu ở db
    public function delete(int $id = 0) {
        return $this->findById($id)->delete();
    }

    //xoá cứng
    public function forceDelete(int $id = 0) {
        return $this->findById($id)->forceDelete();
        
    }

    public function pagination(array $column = ['*'], array $condition= [],array $join = [],array $extend = [],int $perPage = 1) {

        $query = $this->model->select($column)->where(function($query) use ($condition) {
            if(isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%');
            }
        });
        if(!empty($join)) {
            $query->$join(...$join);
        }
        return $query->paginate($perPage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }
    public function findById(
        int $modelId,
        array $column = ['*'],
        array $relation =[]
    ){
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }

}
