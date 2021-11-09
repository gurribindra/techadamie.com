<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {
        abort_if(Gate::denies('slides_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog = Blog::all();

        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        abort_if(Gate::denies('slides_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blog.create');
    }

    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create($request->all());

        if ($request->input('photo', false)) {
            $blog->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.blog.index');
    }

    public function edit($id)
    {
       abort_if(Gate::denies('slides_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $blog = Blog::whereId($id)->first();

        return view('admin.blog.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());

        if ($request->input('photo', false)) {
            if (!$blog->photo || $request->input('photo') !== $blog->photo->file_name) {
                $blog->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($blog->photo) {
            $blog->photo->delete();
        }

        return redirect()->route('admin.blog.index');
    }

    public function show(Blog $blog)
    {
        abort_if(Gate::denies('slides_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog->load('user', 'blog');

        return view('admin.blog.show', compact('blog'));
    }

    public function destroy(Blog $blog)
    {
        abort_if(Gate::denies('slides_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlogRequest $request)
    {
        Blog::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
