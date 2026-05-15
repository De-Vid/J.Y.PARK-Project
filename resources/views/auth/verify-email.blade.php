<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">

    <h2 class="text-2xl font-bold mb-6 text-center">
        Verify Your Email
    </h2>

    @if (session('message'))

        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">

            {{ session('message') }}

        </div>

    @endif

    <p class="text-gray-700 text-center mb-6">

        Please check your Gmail and click the verification link.

    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit"
            class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">
            Resend Verification Email
        </button>
    </form>

</div>


</body>
</html>