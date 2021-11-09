<?php

namespace App\Http\Controllers\Admin;

use App\CoreTeam;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CoreTeamController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {

        $coreteam = CoreTeam::all();

        return view('admin.coreteam.index', compact('coreteam'));
    }

    public function create()
    {
        return view('admin.coreteam.create');
    }

    public function store(Request $request)
    {
        $coreteam = CoreTeam::create($request->all());

        if ($request->input('photo', false)) {
            $coreteam->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.coreteam.index');
    }

    public function edit($id)
    {

       $coreteam = CoreTeam::whereId($id)->first();

        return view('admin.coreteam.edit', compact('coreteam'));
    }

    public function update(Request $request, CoreTeam $coreteam)
    {
        $coreteam->update($request->all());

        if ($request->input('photo', false)) {
            if (!$coreteam->photo || $request->input('photo') !== $coreteam->photo->file_name) {
                $coreteam->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($coreteam->photo) {
            $coreteam->photo->delete();
        }

        return redirect()->route('admin.coreteam.index');
    }
    
}
