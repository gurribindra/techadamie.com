@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Page Edupro
    </div>

    <div class="card-body">
        <form action="{{ route("admin.edupro.update", $edupro->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="description" name="content" class="form-control ">{{ old('content', isset($edupro) ? $edupro->content : '') }}</textarea>
            </div>  
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.update') }}">
            </div>
        </form>


    </div>
</div>
@endsection
