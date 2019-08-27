<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Http\Resources\Admin\RestaurantResource;
use App\Restaurant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestaurantApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('restaurant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RestaurantResource(Restaurant::with(['owner', 'created_by'])->get());
    }

    public function store(StoreRestaurantRequest $request)
    {
        $restaurant = Restaurant::create($request->all());

        if ($request->input('logo', false)) {
            $restaurant->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        return (new RestaurantResource($restaurant))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RestaurantResource($restaurant->load(['owner', 'created_by']));
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

        return (new RestaurantResource($restaurant))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $restaurant->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
