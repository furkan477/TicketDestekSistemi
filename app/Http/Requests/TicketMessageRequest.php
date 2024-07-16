<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketMessageRequest extends FormRequest
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
            'message' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'Mesaj Alanı Boş Gönderilemez',
            'message.min' => 'Mesaj Alanı Minimum 6 karakterden oluşmalıdır.'
        ];
    }
}
