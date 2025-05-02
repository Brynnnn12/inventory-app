<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            "email" => [
                "required",
                "email",
                Rule::unique('suppliers', 'email')->ignore($this->supplier),
            ],
            "phone_number" => [
                "required",
                "numeric",
                Rule::unique('suppliers', 'phone_number')->ignore($this->supplier),
            ],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Supplier wajib diisi",
            "name.string" => "Supplier harus berupa teks",
            "name.min" => "Supplier minimal 3 karakter",
            "name.max" => "Supplier maksimal 50 karakter",
            "email.required" => "Email wajib diisi",
            "email.email" => "Email harus berupa email",
            "email.unique" => "Email sudah terdaftar",
            "phone_number.required" => "Nomor telepon wajib diisi",
            "phone_number.numeric" => "Nomor telepon harus berupa angka",
            "phone_number.unique" => "Nomor telepon sudah terdaftar",
        ];
    }
}
