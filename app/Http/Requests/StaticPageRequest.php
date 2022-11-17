<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaticPageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content_az'=>'required',
            'content_en'=>'required',
            'content_ru'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'content_az.required'=>'Paylaşımın Azərbaycan dilində məzmunu qeyd edilməlidir',
            'content_en.required'=>'Paylaşımın İngilis dilində məzmunu qeyd edilməlidir',
            'content_ru.required'=>'Paylaşımın Rus dilində məzmunu qeyd edilməlidir',
        ];
    }
}
