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
    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword')) ;
        $perPage = $request->integer('perpage');
        $users = $this->userRepository->pagination($this->paginateSelect(), $condition, [], ['path' => 'index'],$perPage);
        return $users;
        
    }
    public function create($request){
        DB::beginTransaction();
        try{

            $payLoad = $request->except(['_token','send','re_password']);
            $payLoad['birthday'] = $this->coverBirthdayDate($payLoad['birthday']);
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

    public function update($id,$request){
        DB::beginTransaction();
        try{
            $payLoad = $request->except(['_token','send']);
            $payLoad['birthday'] = $this->coverBirthdayDate($payLoad['birthday']);
           



            $user = $this->userRepository->update($id,$payLoad);

            DB::commit();
            return true;
        }catch(\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    
    }

    public function destroy($id) {
        DB::beginTransaction();
        try{
           $user = $this->userRepository->delete($id);

            DB::commit();
            return true;
        }catch(\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }

    private function coverBirthdayDate($birthday = '') {
        // Kiểm tra xem ngày có hợp lệ không trước khi xử lý
        if (!$birthday || !\Carbon\Carbon::hasFormat($birthday, 'Y-m-d')) {
            // Xử lý khi ngày nhập không hợp lệ (ví dụ: ghi log, ném ngoại lệ, hoặc trả về giá trị mặc định)
            Log::error("Định dạng ngày sinh không hợp lệ: " . $birthday);
            return null; // Hoặc trả về ngày mặc định
        }
        
        try {
            $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
            return $carbonDate->format('Y-m-d H:i:s');
        } catch (\Exception $e) {
            Log::error("Lỗi khi phân tích ngày sinh: " . $birthday . " với thông báo lỗi: " . $e->getMessage());
            return null; // Hoặc trả về ngày mặc định
        }
    }

    private function paginateSelect() {
        return ['id','email','name','phone', 'address', 'publish'];
    }
    
}
