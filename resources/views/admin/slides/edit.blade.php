@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.slides.title_singular') }}
    </div>

    <div class="card-body">
    <form action="{{ route("admin.slides.update", [$slides->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.slides.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($slides) ? $slides->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slides.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.slides.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($slides) ? $slides->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slides.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.slides.fields.photo') }}</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slides.fields.photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for="url">{{ trans('cruds.slides.fields.url') }}</label>
                <input type="text" id="url" name="url" class="form-control" value="{{ old('url', isset($slides) ? $slides->url : '') }}" step="0.01">
                @if($errors->has('url'))
                    <em class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slides.fields.url_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('btn_text') ? 'has-error' : '' }}">
                <label for="btn_text">{{ trans('cruds.slides.fields.btn_text') }}</label>
                <input type="text" id="btn_text" name="btn_text" class="form-control" value="{{ old('btn_text', isset($slides) ? $slides->btn_text : '') }}" step="0.01">
                @if($errors->has('btn_text'))
                    <em class="invalid-feedback">
                        {{ $errors->first('btn_text') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slides.fields.btn_text_helper') }}
                </p>
            </div>
           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.slides.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($slides) && $slides->photo)
      var file = {!! json_encode($slides->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $slides->photo->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file

            console.log(response);
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop