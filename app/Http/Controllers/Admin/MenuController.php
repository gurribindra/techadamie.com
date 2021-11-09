<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Menu;
use Gate;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title','id')->all();
        return view('admin.menu.menuTreeview',compact('menus','allMenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required',
           'slug' => 'required|alpha_dash'
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        Menu::create($input);
        return back()->with('success', 'Menu added successfully.');
    }

    public function show()
    {
        $menus = Menu::where('parent_id', '=', 0)->get();
        return view('admin.menu.dynamicMenu',compact('menus'));
    }

    public function clear(){
        Menu::truncate();
        return back()->with('danger', 'Menu deleted successfully.');
    }
}