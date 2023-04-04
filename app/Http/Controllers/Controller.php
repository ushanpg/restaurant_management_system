<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

use App\Models\Module;
use App\Models\User;
use App\Models\RoleModule;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data;

    public function viewData(){
        $userid = Auth::id();
        $user = User::where("id",$userid)->get();
        $role = User::where("users.id",$userid)->join("roles","users.role","=","roles.id")->get();
        $modules = RoleModule::where("role_id",$role[0]->id)->join("modules","role_modules.module_id","=","modules.id")->get();

        $this->data = array([
            'user'=> $user,
            'role'=> $role,
            'modules'=> $modules
        ]);
    }
}
