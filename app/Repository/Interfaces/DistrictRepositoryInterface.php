<?php

namespace App\Repository\Interfaces;

/**
 * Interface DistrictServiceInterface
 * @package App\Services\Interfaces
 */
interface DistrictRepositoryInterface
{
    public function all();

    public function findDistrictByProvinceId(int $province_id);
}
