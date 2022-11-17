<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsefulRequest extends FormRequest
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
            'image'=>'image|mimes:jpeg,png,jpg|max:5000',
            'link'=>'required|max:190',
        ];
    }

    public function messages()
    {
        return [
            'image.image'=>'Şəkilin formatı düzgün deyil (qəbul olunan formatlar: jpg, jpeg, png)',
            'image.mimes'=>'Şəkilin formatı düzgün deyil (qəbul olunan formatlar: jpg, jpeg, png)',
            'image.max'=>'Şəkilin ölçüsü ən çox 5000 kb ola bilər',
            'link.required'=>'Link qeyd edilməlidir',
            'link.max'=>'Link ən çox 190 simvoldan ibarət ola bilər',
        ];
    }
}
