<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemplateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'template' => 'required|file|mimes:pdf,doc,docx',  // Validate for template types
        ];
    }

    public function authorize()
    {
        return true;  // Ensure the user is authorized to perform this action
    }
}
