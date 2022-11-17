<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'order_number'=>'required',
            'slug'=>'required|max:191',
            'parent_id'=>'required',
            'name_az'=>'required|max:191',
            'name_en'=>'required|max:191',
            'name_ru'=>'required|max:191',
        ];
    }

    public function messages()
    {
        return [
            'name_az.required'=>'Menyunun Azərbaycan dilində adı qeyd edilməlidir',
            'name_en.required'=>'Menyunun İngilis dilində adı qeyd edilməlidir',
            'name_ru.required'=>'Menyunun Rus dilində adı qeyd edilməlidir',
            'parent_id.required'=>'Əsas menyu qeyd edilməlidir',
            'name_az.max'=>'Menyunun adı ən çox 191 simvoldan ibarət ola bilər',
            'name_en.max'=>'Menyunun adı ən çox 191 simvoldan ibarət ola bilər',
            'name_ru.max'=>'Menyunun adı ən çox 191 simvoldan ibarət ola bilər',
            'order_number.required'=>'Sıra nömrəsi qeyd edilməlidir',
            'slug.required'=>'Slug qeyd edilməlidir',
            'slug.max'=>'Slug ən çox 191 simvoldan ibarət ola bilər',
        ];
    }
}
