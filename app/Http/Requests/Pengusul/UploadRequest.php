<?php

namespace App\Http\Requests\Pengusul;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
             'filePKM' => 'mimes:pdf'
         ];
     }

     public function messages()
     {
         return [
             'filePKM.mimes' => 'File Harus Berformat PDF.'
         ];
     }
   }
