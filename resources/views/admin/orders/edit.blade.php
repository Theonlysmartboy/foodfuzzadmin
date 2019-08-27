@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.orders.update", [$order->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
                <label for="product">{{ trans('cruds.order.fields.product') }}*</label>
                <select name="product_id" id="product" class="form-control select2" required>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ (isset($order) && $order->product ? $order->product->id : old('product_id')) == $id ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_id'))
                    <p class="help-block">
                        {{ $errors->first('product_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">{{ trans('cruds.order.fields.amount') }}*</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($order) ? $order->amount : '') }}" step="1" required>
                @if($errors->has('amount'))
                    <p class="help-block">
                        {{ $errors->first('amount') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.amount_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                <label for="cost">{{ trans('cruds.order.fields.cost') }}*</label>
                <input type="number" id="cost" name="cost" class="form-control" value="{{ old('cost', isset($order) ? $order->cost : '') }}" step="0.01" required>
                @if($errors->has('cost'))
                    <p class="help-block">
                        {{ $errors->first('cost') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.cost_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ordered_by') ? 'has-error' : '' }}">
                <label for="ordered_by">{{ trans('cruds.order.fields.ordered_by') }}*</label>
                <input type="text" id="ordered_by" name="ordered_by" class="form-control" value="{{ old('ordered_by', isset($order) ? $order->ordered_by : '') }}" required>
                @if($errors->has('ordered_by'))
                    <p class="help-block">
                        {{ $errors->first('ordered_by') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.ordered_by_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('delivery_to') ? 'has-error' : '' }}">
                <label for="delivery_to">{{ trans('cruds.order.fields.delivery_to') }}*</label>
                <input type="text" id="delivery_to" name="delivery_to" class="form-control" value="{{ old('delivery_to', isset($order) ? $order->delivery_to : '') }}" required>
                @if($errors->has('delivery_to'))
                    <p class="help-block">
                        {{ $errors->first('delivery_to') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.delivery_to_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.order.fields.status') }}</label>
                <select name="status_id" id="status" class="form-control select2">
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (isset($order) && $order->status ? $order->status->id : old('status_id')) == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_id'))
                    <p class="help-block">
                        {{ $errors->first('status_id') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection