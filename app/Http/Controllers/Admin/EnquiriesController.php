<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Enrollment;
use App\Enquiries;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEnrollmentRequest;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnquiriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enquiries_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiries = Enquiries::orderBy('id','desc')->get();

        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function edit(Enquiries $enquiries)
    {
        abort_if(Gate::denies('enquiries_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $enquiries->load('user', 'course');

        return view('admin.enquiries.edit', compact('users', 'courses', 'enrollment'));
    }

    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        $enrollment->update($request->all());

        return redirect()->route('admin.enrollments.index');
    }

    public function show(Enquiries $enquiries)
    {
        abort_if(Gate::denies('enquiries_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiries->load('user', 'course');

        return view('admin.enquiries.show', compact('enquiries'));
    }

    public function destroy(Enquiries $enquiries)
    {
        abort_if(Gate::denies('enquiries_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiries->delete();

        return back();
    }

    public function massDestroy(MassDestroyEnquiriesRequest $request)
    {
        Enrollment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
