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
            'date_in'  => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'item_id.required'  => 'Item is required',
            'quantity.required' => 'Quantity is required',
            'quantity.integer'  => 'Quantity must be an integer',
            'quantity.min'      => 'Quantity must be at least 1',
            'date_in.required'  => 'Date in is required',
        ];
    }
}
