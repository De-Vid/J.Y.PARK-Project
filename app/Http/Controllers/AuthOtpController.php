<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class AuthOtpController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.phone');
    }

public function sendOtp(Request $request)
{
    $request->validate([
        'phone' => 'required|string|min:8|max:15',
    ]);

    $phone = preg_replace('/\D/', '', $request->phone);

    if (str_starts_with($phone, '855')) {
        $phone = '+' . $phone;
    } elseif (str_starts_with($phone, '0')) {
        $phone = '+855' . substr($phone, 1);
    } else {
        $phone = '+855' . $phone;
    }

    // ✅ លុប strlen check ចោល — ទទួល +855 + 6~9 digits
    if (!preg_match('/^\+855\d{6,9}$/', $phone)) {
        return back()->withErrors([
            'phone' => 'លេខទូរស័ព្ទមិនត្រឹមត្រូវ! សូមបញ្ចូលលេខខ្មែរ'
        ])->withInput();
    }

    $user = User::firstOrCreate(
        ['phone' => $phone],
        [
            'name'     => 'User_' . substr($phone, -4),
            'email'    => $phone . '@phone.local',
            'password' => bcrypt(str()->random(16)),
        ]
    );

    try {
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        $twilio->verify->v2
            ->services(env('TWILIO_VERIFY_SID'))
            ->verifications
            ->create($phone, 'sms');
    } catch (\Exception $e) {
        return back()->withErrors([
            'phone' => 'មិនអាចផ្ញើ SMS បានទេ: ' . $e->getMessage()
        ])->withInput();
    }

    session(['otp_phone' => $phone]);

    return redirect()->route('verify.otp')
        ->with('success', 'OTP បានផ្ញើទៅលេខ ' . $phone);
}

    public function showVerifyForm()
    {
        if (!session('otp_phone')) {
            return redirect()->route('login');
        }
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $phone = session('otp_phone');

        if (!$phone) {
            return redirect()->route('login')
                ->withErrors(['phone' => 'Session หมดอายุ សូម Request OTP ម្តងទៀត']);
        }

        try {
            $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
            $result = $twilio->verify->v2
                ->services(env('TWILIO_VERIFY_SID'))
                ->verificationChecks
                ->create([
                    'to'   => $phone,
                    'code' => $request->otp,
                ]);

            if ($result->status !== 'approved') {
                return back()->withErrors(['otp' => 'លេខ OTP មិនត្រឹមត្រូវ!']);
            }

        } catch (\Exception $e) {
            return back()->withErrors(['otp' => 'មានបញ្ហា: ' . $e->getMessage()]);
        }

        $user = User::where('phone', $phone)->first();

        if (!$user) {
            return redirect()->route('login')
                ->withErrors(['phone' => 'រកមិនឃើញ User សូម Register ម្តងទៀត']);
        }

        $user->update(['phone_verified' => true]);

        Auth::login($user);
        session()->forget('otp_phone');

        return redirect('/dashboard')->with('success', 'ចូលប្រព័ន្ធបានជោគជ័យ!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}