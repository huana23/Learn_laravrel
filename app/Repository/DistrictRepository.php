<?php

namespace App\Repository;
use App\Repository\Interfaces\DistrictRepositoryInterface;
use App\Repository\BaseRepository;
use App\Models\District;

/**
 * Class DistrictRepository
 * @package App\Services
 */
class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    protected $model;
    public function __construct(
        District $model
    ){
        $this->model = $model;
        
    }

    public function findDistrictByProvinceId(int $province_id = 0) {
        return $this->model->where('province_code', '=',$province_id)->get();

    }
}
