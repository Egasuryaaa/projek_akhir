<?php

namespace App\Filament\Resources\ProductResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
			'name' => 'required',
			'slug' => 'required',
			'description' => 'required|string',
			'price' => 'required|numeric',
			'stock' => 'required',
			'category_id' => 'required',
			'seller_id' => 'required',
			'images' => 'required',
			'weight' => 'required|numeric',
			'is_active' => 'required',
			'is_featured' => 'required'
		];
    }
}
