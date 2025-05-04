<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemsInRequest extends FormRequest
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
            'item_id'  => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'date_in'  => 'required|date|after_or_equal:today',
        ];
    }
    public function messages()
    {
        return [
            'item_id.required'  => 'Item harus diisi',
            'quantity.required' => 'Quantity harus diisi',
            'item_id.exists'    => 'Item tidak ditemukan',
            'quantity.integer'  => 'Quantity harus berupa angka',
            'quantity.min'      => 'Quantity minimal 1 karakter',
            'date_in.required'  => 'Tanggal masuk harus diisi',
            'date_in.date'      => 'Tanggal masuk harus berupa tanggal yang valid',
            'date_in.after_or_equal' => 'Tanggal masuk harus sama atau setelah hari ini',
        ];
    }
}
