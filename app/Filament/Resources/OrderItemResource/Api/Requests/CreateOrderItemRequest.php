<?php

namespace App\Filament\Resources\OrderItemResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderItemRequest extends FormRequest
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
			'order_id' => 'required',
			'product_id' => 'required',
			'quantity' => 'required',
			'price' => 'required|numeric',
			'subtotal' => 'required|numeric'
		];
    }
}
