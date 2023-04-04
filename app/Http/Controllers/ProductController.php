<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Category;

class ProductController extends Controller
{
    public function foods(){
        if(Auth::id()){

        $foods = Food::all();
        $cats = Category::all();
        Controller::viewData();
        $data = $this->data;
        return view("admin.foodmenu",compact("foods","cats","data"));
        }else{
            return redirect()->back();
        }

    }

    public function addfood(Request $request){
        if(Auth::id()){

        $food = new Food;

        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imageName);

        $food->image = $imageName;
        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->category = $request->cat;

        $food->save();

        return redirect()->back();
    }else{
        return redirect()->back();
    }
    }

    public function editfood($id){
        if(Auth::id()){

        $food = Food::find($id);
        $cats = Category::all();
        Controller::viewData();
        $data = $this->data;

        return view("admin.editfood",compact("food","cats","data"));
    }else{
        return redirect()->back();
    }
    }

    public function savefood(Request $request, $id){
        if(Auth::id()){

        $food = Food::find($id);

        if($request->image != NULL){
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imageName);
        $food->image = $imageName;
        }

        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->category = $request->cat;

        $food->save();

        return redirect()->back();
    }else{
        return redirect()->back();
    }
    }

    public function disablefood($id){
        if(Auth::id()){

            $food = Food::where("id",$id)->update(["status"=>False]);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }

    public function enablefood($id){
        if(Auth::id()){

            $food = Food::where("id",$id)->update(["status"=>True]);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }

    public function addcat(Request $request){
        if(Auth::id()){

        $cat = new Category;
        $cat->name = $request->name;    
        $cat->save();
        return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function savecat(Request $request, $id){
        if(Auth::id()){
        
        $name = $request->name;
        $cat = Category::where("id",$id)->update(["name" => $name]);  
        return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

}
