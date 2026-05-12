<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white shadow px-6 py-4 flex items-center justify-between">
        <div class="text-xl font-bold text-blue-600">🏠 Dashboard</div>
        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-600">
                👤 {{ Auth::user()->name }}
                ({{ Auth::user()->phone }})
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="text-sm bg-red-500 text-white px-4 py-1.5 rounded-lg hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto mt-10 px-4">

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
        @endif

        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">សូមស្វាគមន៍! 🎉</h2>
            <div class="space-y-3">
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <span class="text-gray-500 text-sm w-32">ឈ្មោះ</span>
                    <span class="font-medium">{{ Auth::user()->name }}</span>
                </div>
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <span class="text-gray-500 text-sm w-32">លេខទូរស័ព្ទ</span>
                    <span class="font-medium">{{ Auth::user()->phone }}</span>
                </div>
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <span class="text-gray-500 text-sm w-32">Phone Verified</span>
                    <span class="font-medium">
                        @if(Auth::user()->phone_verified)
                            <span class="text-green-600">✅ Verified</span>
                        @else
                            <span class="text-red-500">❌ Not Verified</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>

    </div>

</body>
</html>