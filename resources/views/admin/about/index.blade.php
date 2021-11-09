@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.about.create") }}">
                {{ trans('global.add') }} Page Block
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        Page Block {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Course">
                <thead>
                    <tr>
                        <th width="10">
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Photo
                        </th>
                        <th>
                           Description
                        </th>
                        <th>
                            Order
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($about as $key => $abt)
                        <tr data-entry-id="{{ $abt->id }}">
                            <td></td>
                            <td>
                                {{ $abt->id ?? '' }}
                            </td>
                            <td>
                                @if($abt->photo)
                                    <a href="{{ $abt->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $abt->photo->getUrl() }}" width="" height="50px">
                                    </a>
                                @endif 
                            </td>
                            <td>
                                {{ Str::limit($abt->description, 200) ?? '' }}
                            </td>

                            <td>
                                {{ $abt->order_by }}
                            </td>
                            
                            <td>
                            <a class="btn btn-xs btn-info" href="{{ route('admin.about.edit', $abt->id) }}">
                                {{ trans('global.edit') }}
                            </a>
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