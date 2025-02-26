<?php

namespace App\Repository;
use App\Repository\Interfaces\ProvinceRepositoryInterface;
use App\Repository\BaseRepository;
use App\Models\Province;

/**
 * Class ProvinceRepository
 * @package App\Services
 */
class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    protected $model;
    public function __construct(
        Province $model
    ){
        $this->model = $model;
        
    }
}
