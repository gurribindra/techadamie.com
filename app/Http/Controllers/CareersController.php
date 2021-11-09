<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
use App\Careers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CareersController extends Controller
{
    public function index()
    {
        $breadcrumb = "Careers";

        $menus = Menu::where('parent_id','0')->orderBy('id','asc')->get();

        $blocks = Careers::orderBy('order_by','asc')->get();

        return view('careers', compact('breadcrumb','menus','blocks'));
    }

}
