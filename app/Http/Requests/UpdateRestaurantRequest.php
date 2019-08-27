<?php

namespace App\Http\Requests;

use App\Restaurant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateRestaurantRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('restaurant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'r_name'   => [
                'required',
            ],
            'owner_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
