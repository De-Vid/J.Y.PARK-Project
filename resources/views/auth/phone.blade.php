<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ជាមួយទូរស័ព្ទ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm">

        <div class="text-center mb-6">
            <div class="text-4xl mb-2">🔐</div>
            <h2 class="text-2xl font-bold text-gray-800">Login / Register</h2>
            <p class="text-sm text-gray-500 mt-1">បញ្ចូលលេខទូរស័ព្ទដើម្បីទទួល OTP</p>
        </div>

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 p-3 rounded-lg mb-4 text-sm">
            ⚠️ {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('send.otp') }}">
            @csrf
            <label class="block text-sm font-medium text-gray-700 mb-1">
                លេខទូរស័ព្ទ
            </label>
            <div class="flex mb-1">
                <span class="inline-flex items-center px-3 border border-r-0 border-gray-300 bg-gray-50 text-gray-600 rounded-l-lg text-sm">
                    🇰🇭 +855
                </span>
                <input
                    type="text"
                    name="phone"
                    placeholder="068 991 813"
                    maxlength="13"
                    class="flex-1 border border-gray-300 rounded-r-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    value="{{ old('phone') }}"
                    required
                >
            </div>
            <p class="text-xs text-gray-400 mb-4">ឧទាហរណ៍: 068991813 ឬ 012345678</p>

            <button
                type="submit"
                class="w-full bg-blue-500 text-white py-2.5 rounded-lg hover:bg-blue-600 active:bg-blue-700 transition font-medium"
            >
                📨 ផ្ញើ OTP
            </button>
        </form>
    </div>
</body>
</html>