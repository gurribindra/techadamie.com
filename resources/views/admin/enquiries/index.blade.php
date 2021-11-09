@extends('layouts.admin')
@section('content')
@can('enquiries_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.enquiries.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.enquiries.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.enquiries.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Enrollment">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.enquiries.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.enquiries.fields.firstname') }}
                        </th>
                        <th>
                            {{ trans('cruds.enquiries.fields.lastname') }}
                        </th>
                        <th>
                            {{ trans('cruds.enquiries.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.enquiries.fields.phonenumber') }}
                        </th>
                        <th>Child 1 </th>
                        <th>
                            Child 2
                        </th>
                        <th>
                            Child 3
                        </th>
                        <th>
                            Child 4
                        </th>
                        <th>
                            Timezone
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enquiries as $key => $enquiry)
                        <tr data-entry-id="{{ $enquiry->id }}">
                            <td>
                                {{ $enquiry->id ?? '' }}
                            </td>
                            <td>
                                {{ $enquiry->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $enquiry->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $enquiry->email ?? '' }}
                            </td>
                            <td>
                                {{ $enquiry->phone_number ?? '' }}
                            </td>
                            <td>
                               <p> Grade: {{ $enquiry->gd1_grade ?? '' }} </p>
                               <p> Subject: {{ $enquiry->gd1_sub ?? '' }} </p>
                            </td>
                            <td>
                               <p> Grade: {{ $enquiry->gd2_grade ?? '' }} </p>
                               <p> Subject: {{ $enquiry->gd2_sub ?? '' }} </p>
                            </td>
                            <td>
                               <p> Grade: {{ $enquiry->gd3_grade ?? '' }} </p>
                               <p> Subject: {{ $enquiry->gd3_sub ?? '' }} </p>
                            </td>
                            <td>
                               <p> Grade: {{ $enquiry->gd4_grade ?? '' }} </p>
                               <p> Subject: {{ $enquiry->gd4_sub ?? '' }} </p>
                            </td>
                            <td>
                                {{ $enquiry->time_zone ?? '' }}
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
@can('enquiries_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.enquiries.massDestroy') }}",
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
  $('.datatable-Enrollment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection