<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repository\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;





/**
 * Class UserService
 * @package App\Services'
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function paginate()
    {
        $users = $this->userRepository->getAllPaginate();
        return $users;
        
    }

    public function create($request){
        DB::beginTransaction();
        try{

            $payLoad = $request->except(['_token','send','re_password']);
            $carbonDate = Carbon::createFromFormat('Y-m-d', $payLoad['birthday']);
            $payLoad['birthday'] = $carbonDate->format('Y-m-d H:i:s');
            $payLoad['password'] = Hash::make( $payLoad['password']);



            $user = $this->userRepository->create($payLoad);

            DB::commit();
            return true;
        }catch(\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    
    }
}
