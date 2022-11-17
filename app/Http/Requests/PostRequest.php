<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'content_az'=>'required',
            'content_en'=>'required',
            'content_ru'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'image.image'=>'Şəkilin formatı düzgün deyil (qəbul olunan formatlar: jpg, jpeg, png)',
            'image.mimes'=>'Şəkilin formatı düzgün deyil (qəbul olunan formatlar: jpg, jpeg, png)',
            'image.max'=>'Şəkilin ölçüsü ən çox 5000 kb ola bilər',
            'title_az.required'=>'Paylaşımın Azərbaycan dilində başlığı qeyd edilməlidir',
            'title_en.required'=>'Paylaşımın İngilis dilində başlığı qeyd edilməlidir',
            'title_ru.required'=>'Paylaşımın Rus dilində başlığı qeyd edilməlidir',
            'title_az.max'=>'Paylaşımın Azərbaycan dilində başlığı ən çox 191 simvoldan ibarət ola bilər',
            'title_en.max'=>'Paylaşımın İngilis dilində başlığı ən çox 191 simvoldan ibarət ola bilər',
            'title_ru.max'=>'Paylaşımın Rus dilində başlığı ən çox 191 simvoldan ibarət ola bilər',
            'content_az.required'=>'Paylaşımın Azərbaycan dilində məzmunu qeyd edilməlidir',
            'content_en.required'=>'Paylaşımın İngilis dilində məzmunu qeyd edilməlidir',
            'content_ru.required'=>'Paylaşımın Rus dilində məzmunu qeyd edilməlidir',
        ];
    }
}
