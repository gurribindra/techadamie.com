<?php

namespace App\Http\Controllers\Admin;

use App\Slides;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreSlidesRequest;
use App\Http\Requests\UpdateSlidesRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SlidesController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {
        abort_if(Gate::denies('slides_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slides = Slides::all();

        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        abort_if(Gate::denies('slides_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slides.create');
    }

    public function store(StoreSlidesRequest $request)
    {
        $slides = Slides::create($request->all());

        if ($request->input('photo', false)) {
            $slides->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.slides.index');
    }

    public function edit($id)
    {
       abort_if(Gate::denies('slides_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $slides = Slides::whereId($id)->first();

        return view('admin.slides.edit', compact('slides'));
    }

    public function update(UpdateSlidesRequest $request, Slides $slides)
    {
        $slides->update($request->all());

        if ($request->input('photo', false)) {
            if (!$slides->photo || $request->input('photo') !== $slides->photo->file_name) {
                $slides->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($slides->photo) {
            $slides->photo->delete();
        }

        return redirect()->route('admin.slides.index');
    }

    public function show(Slides $slides)
    {
        abort_if(Gate::denies('slides_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slides->load('user', 'slides');

        return view('admin.slides.show', compact('slides'));
    }

    public function destroy(Slides $slides)
    {
        abort_if(Gate::denies('slides_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slides->delete();

        return back();
    }

    public function massDestroy(MassDestroySlidesRequest $request)
    {
        Slides::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
