<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Menu;
use App\Institution;

class BlogController extends Controller
{
    public function index()
    {   
        $breadcrumb =  "Blog Grid";

        $menus = Menu::where('parent_id','0')->orderBy('id','asc')->get();

        $blog = Blog::orderBy('id','desc')->get();

        $slider = false;
        $banner = false;
        $eduedge = false;
        $edupro = false;
        $blogs = false;

        return view('blog', compact(['menus','breadcrumb','blog','slider','banner','eduedge','edupro','blogs']));
    }
}
