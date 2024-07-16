<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginShow()
    {
        return view('frontend.auth.login');
    }

    public function registerShow()
    {
        return view('frontend.auth.register');
    }


    public function login(Request $request)
    {

        if ($request) {

            $value = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($value)) {

                $request->session()->regenerate();
                if(Auth::user()->is_admin == 1){
                    return redirect()->route('admin.dashboard')->withSuccess('Kullanıcı Girişi Yapılmıştır');
                }
                return redirect()->route('index')->withSuccess('Kullanıcı Girişi Yapılmıştır');
            }
        }

        return redirect()->route('login')->withErrors('Kullanıcı Bilgilerinin Doğru Girildiğine Emin Olun.');
    }

    public function register(RegisterFormRequest $request)
    {

        if ($request) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'job' => $request->job,
                'phone' => $request->phone,
                'company' => $request->company,
                'password' => $request->password,
            ]);

            return redirect()->route('login.show')->withSuccess('Kayıt Başarılı Bir Şekilde Oluşturuldu.');
        }

        return redirect('/register');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
