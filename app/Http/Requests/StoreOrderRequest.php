<?php

namespace App\Http\Requests;

use App\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'product_id'  => [
                'required',
                'integer',
            ],
            'amount'      => [
                'required',
                'digits_between:0,10',
            ],
            'cost'        => [
                'required',
            ],
            'ordered_by'  => [
                'required',
            ],
            'delivery_to' => [
                'required',
            ],
        ];
    }
}
