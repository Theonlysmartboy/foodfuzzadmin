@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.restaurant.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.restaurants.update", [$restaurant->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('r_name') ? 'has-error' : '' }}">
                <label for="r_name">{{ trans('cruds.restaurant.fields.r_name') }}*</label>
                <input type="text" id="r_name" name="r_name" class="form-control" value="{{ old('r_name', isset($restaurant) ? $restaurant->r_name : '') }}" required>
                @if($errors->has('r_name'))
                    <p class="help-block">
                        {{ $errors->first('r_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.restaurant.fields.r_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('adress') ? 'has-error' : '' }}">
                <label for="adress">{{ trans('cruds.restaurant.fields.adress') }}</label>
                <input type="text" id="adress" name="adress" class="form-control" value="{{ old('adress', isset($restaurant) ? $restaurant->adress : '') }}">
                @if($errors->has('adress'))
                    <p class="help-block">
                        {{ $errors->first('adress') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.restaurant.fields.adress_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('owner_id') ? 'has-error' : '' }}">
                <label for="owner">{{ trans('cruds.restaurant.fields.owner') }}*</label>
                <select name="owner_id" id="owner" class="form-control select2" required>
                    @foreach($owners as $id => $owner)
                        <option value="{{ $id }}" {{ (isset($restaurant) && $restaurant->owner ? $restaurant->owner->id : old('owner_id')) == $id ? 'selected' : '' }}>{{ $owner }}</option>
                    @endforeach
                </select>
                @if($errors->has('owner_id'))
                    <p class="help-block">
                        {{ $errors->first('owner_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
                <label for="telephone">{{ trans('cruds.restaurant.fields.telephone') }}</label>
                <input type="text" id="telephone" name="telephone" class="form-control" value="{{ old('telephone', isset($restaurant) ? $restaurant->telephone : '') }}">
                @if($errors->has('telephone'))
                    <p class="help-block">
                        {{ $errors->first('telephone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.restaurant.fields.telephone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">{{ trans('cruds.restaurant.fields.logo') }}</label>
                <div class="needsclick dropzone" id="logo-dropzone">

                </div>
                @if($errors->has('logo'))
                    <p class="help-block">
                        {{ $errors->first('logo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.restaurant.fields.logo_helper') }}
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.restaurants.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($restaurant) && $restaurant->logo)
      var file = {!! json_encode($restaurant->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
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