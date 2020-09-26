<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuIdController extends Controller
{
    public function index(Request $request){
        $menu = Menu::find($request->id);
        return response()->json($menu->load('humans'),200);
    }
}
