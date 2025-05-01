<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemsRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'category_id' => ['required', 'exists:categories,id'],
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'unit' => ['required', 'string', 'max:20'],
            'stock' => ['required', 'integer', 'min:0'],
        ];
    }
    public function message()
    {
        return [
            'name.required' => 'Item name tidak boleh kosong.',
            'name.min' => 'Item name minimal 3 characters.',
            'name.max' => 'Item name maximal 50 characters.',
            'category_id.required' => 'Category tidak boleh kosong.',
            'category_id.exists' => 'Category tidak ditemukan.',
            'supplier_id.required' => 'Supplier tidak boleh kosong.',
            'supplier_id.exists' => 'Supplier tidak ditemukan.',
            'unit.required' => 'Unit tidak boleh kosong.',
            'unit.max' => 'Unit maximal 20 characters.',
            'stock.required' => 'Stock tidak boleh kosong.',
            'stock.integer' => 'Stock harus berupa angka.',
            'stock.min' => 'Stock minimal 0.',
        ];
    }
}
