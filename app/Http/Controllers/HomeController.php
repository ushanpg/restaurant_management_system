<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Food;
use App\Models\Cart;


class HomeController extends Controller
{
    public function index(){

        $foods= Food::all();        
        $count= null;
        if(Auth::id()){
        $userid = Auth::id();
        $count = Cart::where("userid",$userid)->count();
        }

        return view('home',compact("foods","count"));
    }

    public function redirect(){

        if(Auth::id()){
        Controller::viewData();
        $data = $this->data;
        return view("admin.adminhome",compact("data"));
        }else{
            return redirect()->back();
        }

    }
}
