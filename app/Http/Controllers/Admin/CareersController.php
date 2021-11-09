<?php

namespace App\Http\Controllers\Admin;

use App\Careers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CareersController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {

        $careers = Careers::all();

        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $careers = Careers::create($request->all());

        if ($request->input('photo', false)) {
            $careers->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.careers.index');
    }

    public function edit($id)
    {

       $careers = Careers::whereId($id)->first();

        return view('admin.careers.edit', compact('careers'));
    }

    public function update(Request $request, Careers $careers)
    {
        $careers->update($request->all());

        if ($request->input('photo', false)) {
            if (!$careers->photo || $request->input('photo') !== $careers->photo->file_name) {
                $careers->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($careers->photo) {
            $careers->photo->delete();
        }

        return redirect()->route('admin.careers.index');
    }
    
}
