<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // هاد الفانكشن كتعرض لينا صفحة (واجهة) تسجيل الدخول
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // هاد الفانكشن كتحقق من المعلومات فاش كيبرك الـ Admin على زر "دخول"
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // يلا كانت المعلومات صحيحة، كنوجهوه للوحة التحكم
            return redirect()->intended('admin'); 
        }

        // يلا كانت المعلومات غالطة، كنرجعوه لصفحة الدخول مع رسالة خطأ
        return back()->withErrors([
            'email' => 'المعلومات لي دخلتي غالطة، عاود تأكد من الإيميل أو كلمة المرور.',
        ])->onlyInput('email');
    }

    // هاد الفانكشن ديال تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}