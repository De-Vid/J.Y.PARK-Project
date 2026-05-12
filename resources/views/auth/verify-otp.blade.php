<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>ផ្ទៀងផ្ទាត់ OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold text-center mb-2">📱 បញ្ចូល OTP</h2>
        <p class="text-center text-gray-500 text-sm mb-6">
            OTP បានផ្ញើទៅ <strong>{{ session('otp_phone') }}</strong>
        </p>

        @if(session('success'))
            <div class="bg-green-100 text-green-600 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('verify.otp.submit') }}">
            @csrf
            <label class="block text-sm font-medium mb-1">លេខ OTP (6 ខ្ទង់)</label>
            <input type="text" name="otp" maxlength="6" placeholder="123456"
                   class="w-full border rounded-lg px-4 py-2 mb-4 text-center text-2xl tracking-widest focus:outline-none focus:ring-2 focus:ring-green-400"
                   required>
            <button type="submit"
                    class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">
                ផ្ទៀងផ្ទាត់
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">
                ← ផ្លាស់ប្តូរលេខទូរស័ព្ទ
            </a>
        </div>
    </div>
</body>
</html>