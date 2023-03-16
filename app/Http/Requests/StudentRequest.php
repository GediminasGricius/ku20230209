<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

    public function messages()
    {
       return  [
            'name'=>'Vardas yra privalomas ir turi būti nuo 3 iki 32 simbolių ilgio',
            'surname'=>'Pavardė yra privaloma ir turi būti nuo 3 iki 32 simbolių ilgio',
            'year.required'=>'Metai yra privalomi',
            'year.integer'=>'Metai turi būti sveikasis skaičius',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3|max:32',
            'surname'=>'required|min:3|max:32',
            'year'=>'required|integer'
        ];
    }
}
