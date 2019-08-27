@extends('layouts.admin')
@section('content')
@can('restaurant_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.restaurants.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.restaurant.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.restaurant.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.restaurant.fields.r_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.restaurant.fields.adress') }}
                        </th>
                        <th>
                            {{ trans('cruds.restaurant.fields.owner') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.restaurant.fields.telephone') }}
                        </th>
                        <th>
                            {{ trans('cruds.restaurant.fields.logo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($restaurants as $key => $restaurant)
                        <tr data-entry-id="{{ $restaurant->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $restaurant->r_name ?? '' }}
                            </td>
                            <td>
                                {{ $restaurant->adress ?? '' }}
                            </td>
                            <td>
                                {{ $restaurant->owner->name ?? '' }}
                            </td>
                            <td>
                                {{ $restaurant->owner->email ?? '' }}
                            </td>
                            <td>
                                {{ $restaurant->telephone ?? '' }}
                            </td>
                            <td>
                                @if($restaurant->logo)
                                    <a href="{{ $restaurant->logo->getUrl() }}" target="_blank">
                                        <img src="{{ $restaurant->logo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('restaurant_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.restaurants.show', $restaurant->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('restaurant_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.restaurants.edit', $restaurant->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('restaurant_delete')
                                    <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('restaurant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.restaurants.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 50,
  });
  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection