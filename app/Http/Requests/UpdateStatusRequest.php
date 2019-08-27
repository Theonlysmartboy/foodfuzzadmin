<?php

namespace App\Http\Requests;

use App\Status;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
                'required',
                'unique:statuses,name,' . request()->route('status')->id,
            ],
            'description' => [
                'required',
                'unique:statuses,description,' . request()->route('status')->id,
            ],
        ];
    }
}
