<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestekRequest extends FormRequest
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
            'category_id' => 'required',
            'level' => 'required',
            'status' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori alanı zorunludur.',
            'level.required' => 'Destek Seviyesini alanı zorunludur.',
            'status.required' => 'Destek Durum alanı zorunludur.',
            'subject.required' => 'Destek Konu alanı zorunludur.',
            'description.required' => 'Destek Sebebi alanı zorunludur.',
        ];
    }
}
