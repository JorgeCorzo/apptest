<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Human;

class HumanController extends Controller
{
    public function store(Request $request){

        $human = new Human();
        $human->name = $request->name;
        $human->nickname = $request->nickname;
        $human->email = $request->email;
        $human->phone = $request->phone;
        $human->age = $request->age;
        $human->menu_id = $request->menu_id;
        $human->save();

        return response()->json($human,201);
    }
}
