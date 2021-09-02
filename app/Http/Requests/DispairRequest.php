<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispairRequest extends FormRequest
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
            'email_destinate' => ['required', 'email'],
            'file-upload' => ['file']
        ];
    }

    public function messages ()
    {
        return [
            'email_destinate.required' => 'Não se esqueça do email do destinatário',
            'email_destinate.filter' => 'O email não é válido',
            'file-upload.file' => 'O arquivo anexado não é um arquivo válido!',
        ];
    }


}
