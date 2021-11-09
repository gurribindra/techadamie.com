<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
use App\Eduedge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EduedgeController extends Controller
{
    public function index()
    {
        $breadcrumb = "Eduedge";

        $menus = Menu::where('parent_id','0')->orderBy('id','asc')->get();
    
    	$educon = Eduedge::first();

        return view('eduedge', compact('breadcrumb','menus','educon'));
    }

}
