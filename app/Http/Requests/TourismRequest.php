<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourismRequest extends FormRequest
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
            'title_az'=>'required|max:191',
            'title_en'=>'required|max:191',
            'title_ru'=>'required|max:191',
            'link'=>'required|max:191',
        ];
    }

    public function messages()
    {
        return [
            'image.image'=>'Şəkilin formatı düzgün deyil (qəbul olunan formatlar: jpg, jpeg, png)',
            'image.mimes'=>'Şəkilin formatı düzgün deyil (qəbul olunan formatlar: jpg, jpeg, png)',
            'image.max'=>'Şəkilin ölçüsü ən çox 5000 kb ola bilər',
            'title_az.required'=>'Azərbaycan dilində başlıq qeyd edilməlidir',
            'title_en.required'=>'İngilis dilində başlıq qeyd edilməlidir',
            'title_ru.required'=>'Rus dilində başlıq qeyd edilməlidir',
            'title_az.max'=>'Azərbaycan dilində başlıq ən çox 191 simvoldan ibarət ola bilər',
            'title_en.max'=>'İngilis dilində başlıq ən çox 191 simvoldan ibarət ola bilər',
            'title_ru.max'=>'Rus dilində başlıq ən çox 191 simvoldan ibarət ola bilər',
            'link.required'=>'Link qeyd edilməlidir',
            'link.max'=>'Link ən çox 191 simvoldan ibarət ola bilər',
        ];
    }
}
