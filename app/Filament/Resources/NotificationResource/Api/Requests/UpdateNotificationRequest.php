<?php

namespace App\Filament\Resources\NotificationResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotificationRequest extends FormRequest
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
			'user_id' => 'required',
			'title' => 'required',
			'content' => 'required|string',
			'type' => 'required',
			'read_at' => 'required',
			'data' => 'required',
			'link' => 'required',
			'order_id' => 'required',
			'appointment_id' => 'required'
		];
    }
}
