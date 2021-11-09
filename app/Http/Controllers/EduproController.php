<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
use App\Edupro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EduproController extends Controller
{
    public function index()
    {
        $breadcrumb = "Edupro";

        $menus = Menu::where('parent_id','0')->orderBy('id','asc')->get();
    
		$educon = Edupro::first();
    
        return view('edupro', compact('breadcrumb','menus','educon'));
    }

}
