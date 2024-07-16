<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => 'required|min:3|string',
            'email' => 'required|min:6',
            'job' => 'required|min:3',
            'company' => 'required|min:3',
            'phone' => 'required|min:8|integer',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ad ve Soyad Zorunludur !',
            'name.min' => 'Ad ve Soyad en az 3 harften oluşmalıdır !',
            'name.string' => 'Ad ve Soyad sadece harflerle oluşmalıdır!',
            'email.min' => 'E-Posta minumum 6 karakterden oluşturulmalıdır !',
            'email.required' => 'E-Posta Zorunludur !',
            'job.required' => 'Meslek Zorunludur !',
            'job.min' => 'Mesleğiniz minumum 3 harften oluşturulmalıdır !',
            'company.required' => 'Şirket Zorunludur !',
            'company.min' => 'Şirket minumum 3 harften oluşturulmalıdır  !',
            'phone.required' => 'Telefon Zorunludur !',
            'phone.min' => 'Telefon minumum 8 harften oluşturulmalıdır !',
            'phone.integer' => 'Telefon sayılardan oluşturulmalıdır  !',
            'phone.required' => 'Şifre Zorunludur !',
            'phone.min' => 'Şifre minumum 6 harften oluşturulmalıdır !',
            'password.confirmed' => 'Şifreler Uyuşmuyor  !',
        ];
    }
}
