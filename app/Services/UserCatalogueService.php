<?php

namespace App\Services;
use App\Services\Interfaces\UserCatalogueServiceInterface;
use App\Repository\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserCatalogueService
 * @package App\Services
 */
class UserCatalogueService implements UserCatalogueServiceInterface
{
    protected $userCatalogueRepository;
    public function __construct(UserCatalogueRepository $userCatalogueRepository)
    {
        $this->userCatalogueRepository = $userCatalogueRepository;
    }
    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword')) ;
        $perPage = $request->integer('perpage');
        $userCatalogues = $this->userCatalogueRepository->pagination($this->paginateSelect(), $condition, [], ['path' => 'user/catalogue/index'],$perPage, ['users']);
        return $userCatalogues;
        
    }
    public function create($request){
        DB::beginTransaction();
        try{

            $payLoad = $request->except(['_token','send']);




            $user = $this->userCatalogueRepository->create($payLoad);

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
           



            $user = $this->userCatalogueRepository->update($id,$payLoad);

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
           $user = $this->userCatalogueRepository->delete($id);

            DB::commit();
            return true;
        }catch(\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }

    public function updateStatus($post = []) {
        
        DB::beginTransaction();
        try{

            $payLoad[$post['field']] = (($post['value']== 1) ? 0:1);
            $user = $this->userCatalogueRepository->update($post['modelId'], $payLoad  );

            DB::commit();
            return true;
        }catch(\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }


    public function updateStatusAll($post){
        DB::beginTransaction();
        try{

            $payLoad[$post['field']] = $post['value'];
            $flag = $this->userCatalogueRepository->updateByWhereIn('id', $post['id'],$payLoad);
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
        return ['id','name','description','publish'];
    }
}
