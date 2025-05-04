<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemsOutRequest extends FormRequest
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
            'date_out'  => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'item_id.required'  => 'Item harus diisi',
            'item_id.exists'    => 'Item tidak ditemukan',
            'quantity.required' => 'Quantity harus diisi',
            'quantity.integer'  => 'Quantity harus berupa angka',
            'quantity.min'      => 'Quantity minimal 1 karakter',
            'date_out.date'     => 'Tanggal keluar harus berupa tanggal yang valid',
            'date_out.after_or_equal' => 'Tanggal keluar harus sama atau setelah hari ini',
            'date_out.required'  => 'Tanggal keluar harus diisi',
        ];
    }
}
