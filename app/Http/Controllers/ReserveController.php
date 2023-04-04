<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ReserveController extends Controller
{
    public function reservations(){
            if(Auth::id()){
    
            $reservations = Reservation::all();
            Controller::viewData();
            $data = $this->data;
    
            return view("admin.reservation",compact("reservations","data"));
        }else{
            return redirect()->back();
        }
        
    }

    public function reserve(Request $request){

        $event = new Reservation;

        $event->name = $request->name;
        $event->email = $request->email;
        $event->phone = $request->phone;
        $event->guests = $request->guests;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->message = $request->message;

        $event->save();
        return redirect()->back();

    }
}
