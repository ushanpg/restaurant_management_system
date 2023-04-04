<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Food;
use App\Models\Cart;
class OrderController extends Controller
{
    public function orders(){
        if(Auth::id()){

        $orders = Food::select("*","food.name as food")->join("orders","food.id","=","orders.foodid")->get();
        Controller::viewData();
        $data = $this->data;

        return view("admin.orders",compact("orders","data"));
    }else{
        return redirect()->back();
    }
    }


    public function searchorders(Request $request){
        if(Auth::id()){

        Controller::viewData();
        $data = $this->data;

        $orders = Food::select("*","food.name as food")->join("orders","food.id","=","orders.foodid")->
        where("orders.name","Like",'%'.$request->search.'%')->orwhere("phone","Like",'%'.$request->search.'%')->        
        orwhere("address","Like",'%'.$request->search.'%')->orwhere("quantity","Like",'%'.$request->search.'%')->
        orwhere("food.name","Like",'%'.$request->search.'%')->orwhere("price","Like",'%'.$request->search.'%')->get();

        return view("admin.orders",compact("orders","data"));        
    }else{
        return redirect()->back();
    }    

    }
    
    public function addCart(Request $request, $id){
        if(Auth::id()){

            $cart = new Cart;
            $userid = Auth::id();

            $cart->userid = $userid;
            $cart->foodid = $id;
            $cart->amount = $request->amount;
            $cart->save();

            return redirect()->back();


        }else{
            return redirect("/login");
        }
    }

    
    public function showCart(){
        if(Auth::id()){

            $userid = Auth::id();
            $count = Cart::where("userid",$userid)->count();
            $items = Food::select("*","food.name as food")->where("userid",$userid)->join("carts","food.id","=","carts.foodid")->get();

            return view("showcart",compact("userid","count","items"));
        
        }else{
            return redirect("/login");
        }
         
    }

    public function dropCart($id){
        if(Auth::id()){

        $userid = Auth::id();
        $item = Cart::where("id",$id);
        $item->delete();

        return redirect()->back();

    }else{
        return redirect("/login");
    }
    }

    public function checkout(Request $request){

        $userid = Auth::id();
        $items = Cart::where("userid",$userid)->get();

        foreach($items as $item){

            $order = new Order;
            $order->userid = $userid;
            $order->foodid = $item->foodid;
            $order->quantity = $item->amount;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;

            $order->save();

            $removeCart = Cart::where("id",$item->id)->delete();
            }
            
            return redirect()->back();
    }
}
