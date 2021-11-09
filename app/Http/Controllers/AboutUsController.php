<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
use App\AboutUs;
use App\CoreTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AboutUsController extends Controller
{
    public function index()
    {
        $breadcrumb = "About us";

        $menus = Menu::where('parent_id','0')->orderBy('id','asc')->get();

        $blocks = AboutUs::orderBy('order_by','asc')->get();
    
        $team = CoreTeam::orderBy('order_by','asc')->get();

        return view('aboutus', compact('breadcrumb','menus','blocks','team'));
    }

}
