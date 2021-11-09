<?php

namespace App\Http\Controllers\Admin;

use App\Eduedge;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EduedgeController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {
        $id='1';

        $eduedge = Eduedge::where('id',$id)->first();

        return view('admin.eduedge.index', compact('eduedge'));
    }

    public function update(Request $request, Eduedge $eduedge)
    {
        $eduedge->update($request->all());

        return redirect()->route('admin.eduedge.index');
    }
    
}
