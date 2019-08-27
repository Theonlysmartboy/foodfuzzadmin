@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.restaurant.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.restaurant.fields.id') }}
                        </th>
                        <td>
                            {{ $restaurant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.restaurant.fields.r_name') }}
                        </th>
                        <td>
                            {{ $restaurant->r_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.restaurant.fields.adress') }}
                        </th>
                        <td>
                            {{ $restaurant->adress }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.restaurant.fields.owner') }}
                        </th>
                        <td>
                            {{ $restaurant->owner->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.restaurant.fields.telephone') }}
                        </th>
                        <td>
                            {{ $restaurant->telephone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.restaurant.fields.logo') }}
                        </th>
                        <td>
                            @if($restaurant->logo)
                                <a href="{{ $restaurant->logo->getUrl() }}" target="_blank">
                                    <img src="{{ $restaurant->logo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection