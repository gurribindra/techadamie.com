<?php

namespace App\Http\Requests;

use App\Slides;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSlidesRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('slides_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'unique:slides',
            ],
            'description.*'  => [
                'string',
            ],
        ];
    }
}
