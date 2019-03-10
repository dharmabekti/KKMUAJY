<?php

namespace App\Http\Requests\Pengusul;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
             'first_name' => 'Required',
             'last_name' => 'Required',
             'npm' => 'Required|min:9|max:9|unique:users'
         ];
     }

     public function messages()
     {
         return [
             'first_name.required' => 'First Name Tidak Boleh Kosong',
             'last_name.unique' => 'Last Name Tidak Boleh Kosong',
             'npm.required' => 'NPM Tidak Boleh Kosong',
             'npm.min' => 'NPM Tidak Sesuai',
             'npm.max' => 'NPM Tidak Sesuai',
             'npm.unique' => 'NPM Sudah Terdaftar'
         ];
     }
   }
