<?php

namespace App\Http\Controllers;

use App\Course;
use App\Menu;
use App\Slides;
use App\Institution;

class HomeController extends Controller
{
    public function index()
    {   
        $menus = Menu::where('parent_id','0')->orderBy('id','asc')->get();

        $newestCourses = Course::orderBy('id', 'desc')->take(3)->get();

        $randomInstitutions = Institution::inRandomOrder()->take(3)->get();

        $slide = Slides::orderBy('id','asc')->get();

        $slider = true;
        $banner = true;
        $eduedge = true;
        $edupro = true;
        $blogs = true;

        return view('home', compact(['menus','slide','newestCourses', 'randomInstitutions','slider','banner','eduedge','edupro','blogs']));
    }
}
