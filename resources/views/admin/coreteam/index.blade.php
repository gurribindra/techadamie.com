@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.coreteam.create") }}">
                {{ trans('global.add') }} New Team Member
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        Team Member {{ trans('global.list') }}
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
                           Name
                        </th>
                        <th>
                           Possition
                        </th>
                        <th>
                           Facebook
                        </th>
                        <th>
                           Twitter
                        </th>
                        <th>
                           Instagram
                        </th>
                        <th>
                           Linkedin
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
                    @foreach($coreteam as $key => $ct)
                        <tr data-entry-id="{{ $ct->id }}">
                            <td></td>
                            <td>
                                {{ $ct->id ?? '' }}
                            </td>
                            <td>
                                @if($ct->photo)
                                    <a href="{{ $ct->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $ct->photo->getUrl() }}" width="" height="50px">
                                    </a>
                                @endif 
                            </td>
                            <td>
                                {{ $ct->name }}
                            </td>
                            <td>
                                {{ $ct->possition }}
                            </td>
                            <td>
                                {{ $ct->facebook_link }}
                            </td>
                            <td>
                                {{ $ct->twitter_link }}
                            </td>
                            <td>
                                {{ $ct->instagram_link }}
                            </td>
                            <td>
                                {{ $ct->linkedin_link }}
                            </td>
                            <td>
                                {{ $ct->order_by }}
                            </td>
                            <td>
                            <a class="btn btn-xs btn-info" href="{{ route('admin.coreteam.edit', $ct->id) }}">
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