<?php

namespace App\Http\Controllers\Admin;

use App\Edupro;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EduproController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {
        $id='1';

        $edupro = Edupro::where('id',$id)->first();

        return view('admin.edupro.index', compact('edupro'));
    }

    public function update(Request $request, Edupro $edupro)
    {
        $edupro->update($request->all());

        return redirect()->route('admin.edupro.index');
    }
    
}
