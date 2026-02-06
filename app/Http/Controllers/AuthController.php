<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{    
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/profile');
        }

        return view('login');
    }

    private function autoLoginFromCookie()
    {
        // Cek jika sudah login
        if (Auth::check()) {
            return true;
        }

        // Cek cookie remember_token
        $rememberToken = Cookie::get('remember_token');
        
        if ($rememberToken) {
            // Cari user berdasarkan token
            $user = User::where('remember_token', $rememberToken)->first();
            
            if ($user) {
                // Login user
                Auth::login($user);
                return true;
            }
        }
        
        return false;
    }

   public function login(Request $request)
    {
        $request->validate([
            'email'                 => 'required|email',
            'password'              => 'required',
            'g-recaptcha-response' => 'required'
        ]);

      $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip()
            ]
        );

        if (! $response->json('success')) {
            return back()->withErrors(['captcha' => 'Captcha tidak valid']);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {

            $request->session()->regenerate();

            // 🔥 CEK EMAIL VERIFIED
            if (! Auth::user()->hasVerifiedEmail()) {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Email belum diverifikasi. Silakan cek email Anda.',
                ]);
            }

            return redirect()->intended('/profile');
        }
        return back()->withErrors([
            'email' => 'Email atau kata sandi yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'agree'   => 'accepted',
        ]);

        // Simpan ke database MySQL
        $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

         $user->sendEmailVerificationNotification();

        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan masuk.');
    }

    public function redirectGoogle()
    {
        //dd('route kepanggil');
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            ['email' => $googleUser->email],
            [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
            ]
        );

        Auth::login($user);

        return redirect('/profile');
    }

    public function showLinkRequestForm()
    {
        return view('forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Link reset password telah dikirim ke email Anda.')
            : back()->withErrors(['email' => 'Gagal mengirim email reset password.']);
    }

    public function showResetForm($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'reset_password_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect('/login')->with('success', 'Password berhasil diubah, silakan login.')
            : back()->withErrors(['email' => 'Token reset tidak valid atau kadaluarsa.']);
    }
}
