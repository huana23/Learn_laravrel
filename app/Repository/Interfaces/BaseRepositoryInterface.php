<?php

namespace App\Repository\Interfaces;

/**
 * Interface BaseServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
    public function all();

    public function findById(int $id);
    public function create(array $payLoad);
    public function update(int $id = 0, array $payLoad = []);
    public function delete(int $id = 0);
    public function pagination(array $column = ['*'], array $condition= [],array $join = [],array $extend = [],int $perPage = 1) ;
    public function updateByWhereIn(string $whereInField ='', array $whereIn= [], array $payload =[]);
}