<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRestaurantRequest;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Restaurant;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestaurantController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('restaurant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $restaurants = Restaurant::all();

        return view('admin.restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        abort_if(Gate::denies('restaurant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owners = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.restaurants.create', compact('owners'));
    }

    public function store(StoreRestaurantRequest $request)
    {
        $restaurant = Restaurant::create($request->all());

        if ($request->input('logo', false)) {
            $restaurant->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        return redirect()->route('admin.restaurants.index');
    }

    public function edit(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owners = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $restaurant->load('owner', 'created_by');

        return view('admin.restaurants.edit', compact('owners', 'restaurant'));
    }

    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant->update($request->all());

        if ($request->input('logo', false)) {
            if (!$restaurant->logo || $request->input('logo') !== $restaurant->logo->file_name) {
                $restaurant->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($restaurant->logo) {
            $restaurant->logo->delete();
        }

        return redirect()->route('admin.restaurants.index');
    }

    public function show(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $restaurant->load('owner', 'created_by');

        return view('admin.restaurants.show', compact('restaurant'));
    }

    public function destroy(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $restaurant->delete();

        return back();
    }

    public function massDestroy(MassDestroyRestaurantRequest $request)
    {
        Restaurant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
