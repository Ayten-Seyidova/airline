<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'phone'=>'required|max:25',
            'fax'=>'required|max:25',
            'mail'=>'required|max:50',
            'keywords_az'=> 'required|max:191',
            'keywords_en'=> 'required|max:191',
            'keywords_ru'=> 'required|max:191',
            'address_az'=> 'required|max:191',
            'address_en'=> 'required|max:191',
            'address_ru'=> 'required|max:191',
            'title_az'=> 'required|max:191',
            'title_en'=> 'required|max:191',
            'title_ru'=> 'required|max:191',
            'description_az'=> 'required',
            'description_en'=> 'required',
            'description_ru'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Telefon nömrəsi qeyd edilməlidir',
            'phone.max' => 'Telefon nömrəsi ən çox 25 simvol ola bilər',
            'fax.required' => 'Faks nömrəsi qeyd edilməlidir',
            'fax.max' => 'Faks nömrəsi ən çox 25 simvol ola bilər',
            'mail.required' => 'E-poçt adresi qeyd edilməlidir',
            'mail.max' => 'E-poçt adresi ən çox 50 simvol ola bilər',
            'address_az.required' => 'Azərbaycan dilində adres qeyd edilməlidir',
            'address_en.required' => 'İngilis dilində adres qeyd edilməlidir',
            'address_ru.required' => 'Rus dilində adres qeyd edilməlidir',
            'address_az.max' => 'Adres ən çox 191 simvol ola bilər',
            'address_en.max' => 'Adres ən çox 191 simvol ola bilər',
            'address_ru.max' => 'Adres ən çox 191 simvol ola bilər',
            'title_az.required' => 'Azərbaycan dilində başlıq qeyd edilməlidir',
            'title_en.required' => 'İngilis dilində başlıq qeyd edilməlidir',
            'title_ru.required' => 'Rus dilində başlıq qeyd edilməlidir',
            'title_az.max' => 'Başlıq ən çox 191 simvol ola bilər',
            'title_en.max' => 'Başlıq ən çox 191 simvol ola bilər',
            'title_ru.max' => 'Başlıq ən çox 191 simvol ola bilər',
            'keywords_az.required' => 'Azərbaycan dilində açar söz qeyd edilməlidir',
            'keywords_en.required' => 'İngilis dilində açar söz qeyd edilməlidir',
            'keywords_ru.required' => 'Rus dilində açar söz qeyd edilməlidir',
            'keywords_az.max' => 'Açar söz ən çox 191 simvol ola bilər',
            'keywords_en.max' => 'Açar söz ən çox 191 simvol ola bilər',
            'keywords_ru.max' => 'Açar söz ən çox 191 simvol ola bilər',
            'description_az.required' => 'Azərbaycan dilində açıqlama qeyd edilməlidir',
            'description_en.required' => 'İngilis dilində açıqlama qeyd edilməlidir',
            'description_ru.required' => 'Rus dilində açıqlama qeyd edilməlidir',
        ];
    }
}
