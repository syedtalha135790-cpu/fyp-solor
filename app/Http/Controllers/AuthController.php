<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Mail\VerifyUser;

class AuthController extends Controller
{
    /* ================= Register ================= */

    // Register form
    public function registerForm()
    {
        return view('frontend.register');
    }

    // Register submit
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'is_verified' => false,
        ]);

        // Create verification link
        $encryptedEmail = Crypt::encrypt($user->email);
        $verifyLink = url('/verify-user/' . $encryptedEmail);

        // Send verification email
        Mail::to($user->email)->send(new VerifyUser($verifyLink));

        return redirect()->route('user.login')
            ->with('success', 'Account created. Please verify your email.');
    }

    /* ================= Login ================= */

    public function loginForm()
    {
        return view('frontend.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email not found');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid password');
        }

        if (!$user->is_verified) {
            return back()->with('error', 'Please verify your email first.');
        }

        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);
        Session::put('user_email', $user->email);

        return redirect()->route('home')->with('success', 'Login successful');
    }

    /* ================= Dashboard ================= */

    public function dashboard()
    {
        return view('user.dashboard');
    }

    /* ================= Logout ================= */

    public function logout(Request $request)
    {
        Session::flush();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }

    /* ================= Email Verification ================= */

    public function verifyUser($email)
    {
        try {
            $decryptedEmail = Crypt::decrypt($email);

            $user = User::where('email', $decryptedEmail)->first();

            if (!$user) {
                return redirect()->route('user.register')
                    ->with('error', 'Invalid verification link.');
            }

            $user->is_verified = true;
            $user->save();

            return redirect()->route('user.login')
                ->with('success', 'Email verified successfully. You can now log in.');

        } catch (\Exception $e) {

            return redirect()->route('user.register')
                ->with('error', 'Invalid or expired verification link.');
        }
    }
}
