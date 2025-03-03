<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService; 
use App\Repository\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository; 
use App\Http\Requests\StoreUserCatalogueRequest;




class UserCatalogueController extends Controller
{

    protected $userCatalogueService;
    protected $userCatalogueRepository;


    public function __construct(
        UserCatalogueService $userCatalogueService,
        UserCatalogueRepository $userCatalogueRepository

    ) {
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;

    }
    

    public function index(Request $request){


        $userCatalogues = $this->userCatalogueService->paginate($request);


        $config =  [
            'js' => [
                asset('backend/js/plugins/switchery/switchery.js'),
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                asset('backend/library/library.js')
            ],
            'css' => [
                asset('backend/css/plugins/switchery/switchery.css'),
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];
        $config['seo'] = config('apps.usercatalogue');
        $template = 'backend.user.catalogue.index';
        return view('backend.dashboard.layout' , compact(
            'template',
            'config',
            'userCatalogues'
       ));
    }
    
    public function create() {

        $template = 'backend.user.catalogue.store';
        $config['method'] = 'create';
        $config['seo'] = config('apps.user');
        return view('backend.dashboard.layout' , compact(
            'template',
            'config',

       ));
    }

    public function store(StoreUserCatalogueRequest $request) {
        if($this->userCatalogueService->create($request)){
            return redirect()->route('user.catalogue.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Thêm mới bản ghi thất bại');

    }

    public function edit($id) {
        $userCatalogue =$this->userCatalogueRepository->findById($id);


        $template = 'backend.user.catalogue.store';
        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';
        return view('backend.dashboard.layout' , compact(
            'template',
            'config',
            'userCatalogue'

       ));
    }

    public function update($id, StoreUserCatalogueRequest $request) {
        if($this->userCatalogueService->update($id, $request)){
            return redirect()->route('user.catalogue.index')->with('success', 'Cập Nhật bản ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Cập Nhật bản ghi thất bại');
    }

    public function delete($id) {
        $template = 'backend.user.catalogue.delete';
        $config['seo'] = config('apps.user');
        $userCatalogue =$this->userCatalogueRepository->findById($id);

        
        return view('backend.dashboard.layout' , compact(
            'template',
            'config',
            'userCatalogue',

       ));
    }

    public function destroy($id) {
        if($this->userCatalogueService->destroy($id)){
            return redirect()->route('user.catalogue.index')->with('success', 'Xoá bản ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Xoá bản ghi thất bại');
    }
}
