<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService; 



class DashboardController extends Controller
{



    public function __construct(){


    }

    public function changeStatus(Request $request) {
        $post = $request->input();
        $serviceInterfaceNamespace = '\App\Services\\'.ucfirst($post['model']).'Service';
        if(class_exists($serviceInterfaceNamespace)) {
            $serviceInterface = app($serviceInterfaceNamespace);
        }
        $flag = $serviceInterface->updateStatus($post);
        
        return  response()->json(['flag' => $flag]);

    }
    public function changeStatusAll(Request $request) {
        $post = $request->input();

        $serviceInterfaceNamespace = '\App\Services\\'.ucfirst($post['model']).'Service';
        if(class_exists($serviceInterfaceNamespace)) {
            $serviceInterface = app($serviceInterfaceNamespace);
        }
        $flag = $serviceInterface->updateStatusAll($post);
        return  response()->json(['flag' => $flag]);

    }
}
