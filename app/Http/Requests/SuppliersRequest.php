<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "name" => ["required", "string", "min:3", "max:50"],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Supplier wajib diisi",
            "name.string" => "Supplier harus berupa teks",
            "name.min" => "Supplier minimal 3 karakter",
            "name.max" => "Supplier maksimal 50 karakter",
        ];
    }
}
