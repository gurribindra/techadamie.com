<?php

namespace App\Http\Controllers\Admin;

use App\AboutUs;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class AboutUsController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {

        $about = AboutUs::all();

        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $about = AboutUs::create($request->all());

        if ($request->input('photo', false)) {
            $about->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.about.index');
    }

    public function edit($id)
    {

       $about = AboutUs::whereId($id)->first();

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, AboutUs $about)
    {
        $about->update($request->all());

        if ($request->input('photo', false)) {
            if (!$about->photo || $request->input('photo') !== $about->photo->file_name) {
                $about->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($about->photo) {
            $about->photo->delete();
        }

        return redirect()->route('admin.about.index');
    }
    
}
