<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){

        $users = User::all();

        $config = $this->config();
       $template = 'backend.user.index';
       return view('backend.dashboard.layout' , compact(
        'template',
        'config',
        'users'
       ));
    }

    private function config() {
        return [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'backend/library/library.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
    }
}
