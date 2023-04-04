<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Module;
use App\Models\Role;

class UserController extends Controller
{
    public function users(){

        if(Auth::id()){
        Controller::viewData();    
        $data = $this->data;
        $users = Role::select("*","roles.name as role")->join("users","roles.id","=","users.role")->get();

        return view("admin.user",compact("users","data"));
        }else{
            return redirect()->back();
        }
    }
    public function deactivate($id){
        if(Auth::id()){
        $user = User::where("id",$id)->update(["status"=> False]);
        return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
    public function activate($id){
        if(Auth::id()){
        $user = User::where("id",$id)->update(["status"=> True]);
        return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
    public function edituser($id){
        if(Auth::id()){
            Controller::viewData();
            $data = $this->data;
            $roles = Role::all();
            $user2 = User::where("id",$id)->get();
            return view("admin.edituser",compact("user2","roles","data"));
            }else{
                return redirect()->back();
            }
    }
    public function saveuser(Request $request, $id){
        if(Auth::id()){
            $user = User::where("id",$id);

            if($request->image != NULL){
                $imageName = time().".".$request->image->getClientOriginalExtension();
                $request->image->move("images",$imageName);
                $user->update(["profile_photo_path"=>$imageName]);
            }

            $user->update(
                ["name"=>$request->username, 
                "email"=>$request->email,
                "first_name"=>$request->firstname,
                "last_name"=>$request->lastname,
                "nic"=>$request->nic,
                "dob"=>$request->dob,
                "gender"=>$request->gender,
                "tel1"=>$request->tel1,
                "tel2"=>$request->tel2,
                "role"=>$request->role ]);
                return redirect()->back();
            }else{
                return redirect()->back();
            }
    }

    public function logout(Request $request){
        if(Auth::id()){

            $request->session()->flush();
            return redirect("/");
        }else{
            return redirect()->back();
        }

    }
}
