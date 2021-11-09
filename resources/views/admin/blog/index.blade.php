@extends('layouts.admin')
@section('content')
@can('slides_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.blog.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.blog.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.blog.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Course">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.blog.fields.tag') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blog as $key => $bg)
                        <tr data-entry-id="{{ $bg->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bg->id ?? '' }}
                            </td>
                            <td>
                                {{ $bg->title ?? '' }}
                            </td>
                            <td>
                                {{ Str::limit($bg->description, 200) ?? '' }}
                            </td>
                            <td>
                                @if($bg->photo)
                                    <a href="{{ $bg->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $bg->photo->getUrl() }}" width="" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $bg->category ?? '' }}
                            </td>
                            <td>
                                {{ $bg->tag ?? '' }}
                            </td>
                            <td>
                                @can('slides_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.blog.show', $bg->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('slides_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.blog.edit', $bg->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('slides_delete')
                                    <form action="{{ route('admin.blog.destroy', $bg->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('slides_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.blog.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Course:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection