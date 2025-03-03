<?php

namespace App\Repository;
use App\Repository\Interfaces\UserCatalogueRepositoryInterface;
use App\Repository\BaseRepository;



use App\Models\UserCatalogue;

/**
 * Class UserCatalogueRepository
 * @package App\Services
 */
class UserCatalogueRepository extends BaseRepository implements UserCatalogueRepositoryInterface
{

    protected $model;
    public function __construct(
        UserCatalogue $model
    ){
        $this->model = $model;
        
    }

}
