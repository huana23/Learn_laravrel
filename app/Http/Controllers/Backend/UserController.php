<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService; 
use App\Repository\Interfaces\ProvinceRepositoryInterface as ProvinceRepository; 
use App\Repository\Interfaces\UserRepositoryInterface as UserRepository; 
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;



class UserController extends Controller
{

    protected $userService;
    protected $provinceRepository;
    protected $userRepository;


    public function __construct(
        UserService $userService,
        ProvinceRepository $provinceRepository,
        UserRepository $userRepository

    ) {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->userRepository = $userRepository;

    }
    

    public function index(){
        $users = $this->userService->paginate();


        $config =  [
            'js' => [
                asset('backend/js/plugins/switchery/switchery.js'),
                asset('backend/library/library.js')
            ],
            'css' => [
                asset('backend/css/plugins/switchery/switchery.css')
            ]
        ];
        $config['seo'] = config('apps.user');
        $template = 'backend.user.index';
        return view('backend.dashboard.layout' , compact(
            'template',
            'config',
            'users'
       ));
    }
    
    public function create() {

        $provinces = $this->provinceRepository->all();
        $template = 'backend.user.store';
        $config = [
            'method' => 'create',
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                asset('backend/library/location.js'),
                asset('plugin/ckfinder/ckfinder.js'),


            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];
        $config['seo'] = config('apps.user');
        return view('backend.dashboard.layout' , compact(
            'template',
            'config',
            'provinces',

       ));
    }

    public function store(StoreUserRequest $request) {
        if($this->userService->create($request)){
            return redirect()->route('user.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Thêm mới bản ghi thất bại');

    }

    public function edit($id) {
        $user =$this->userRepository->findById($id);
        $provinces = $this->provinceRepository->all();
        $template = 'backend.user.store';
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                asset('backend/library/location.js'),
                asset('plugin/ckfinder/ckfinder.js'),


            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];
        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';
        return view('backend.dashboard.layout' , compact(
            'template',
            'config',
            'provinces',
            'user'

       ));
    }

    public function update($id, UpdateUserRequest $request) {
        if($this->userService->update($id, $request)){
            return redirect()->route('user.index')->with('success', 'Cập Nhật bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Cập Nhật bản ghi thất bại');
    }

    public function delete($id) {
        $template = 'backend.user.delete';
        $config['seo'] = config('apps.user');
        $user =$this->userRepository->findById($id);

        
        return view('backend.dashboard.layout' , compact(
            'template',
            'config',
            'user',

       ));
    }

    public function destroy($id) {
        if($this->userService->destroy($id)){
            return redirect()->route('user.index')->with('success', 'Xoá bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Xoá bản ghi thất bại');
    }
}
