<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;

use App\Models\Order;
use App\Models\Module;

class AdminController extends Controller
{
    
    


    

    public function deleteUser($id){
        if(Auth::id()){

        $user = User::find($id);
        $user->delete();

        return redirect()->back();
        }else{
            return redirect()->back();
        }

    }

    
    

    public function dropFood($id){
        if(Auth::id()){

        $food = Food::find($id);
        $food->delete();

        return redirect()->back();
    }else{
        return redirect()->back();
    }

    }

    

    


    


    
}

