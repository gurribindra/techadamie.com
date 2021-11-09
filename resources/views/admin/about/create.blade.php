@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Page Block
    </div>

    <div class="card-body">
        <form action="{{ route("admin.about.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.blog.fields.photo') }}</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.blog.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($about) ? $about->description : '') }}</textarea>
            </div>
            <div class="form-group {{ $errors->has('order_by') ? 'has-error' : '' }}">
                <label for="order_by">Order By</label>
                <input type="number" id="order_by" name="order_by" class="form-control" value="{{ old('order_by', isset($about) ? $about->order_by : '') }}" step="0.01">
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
    url: '{{ route('admin.about.storeMedia') }}',
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
@if(isset($about) && $about->photo)
      var file = {!! json_encode($about->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $about->photo->getUrl('thumb') }}')
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