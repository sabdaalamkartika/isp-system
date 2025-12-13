<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">

    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login</h1>

    <!-- Error Message -->
    @if ($errors->any())
        <p class="text-red-500 text-sm mb-4">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" name="email" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Password</label>
            <input type="password" name="password" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit"
            class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition font-medium">
            Login
        </button>
    </form>

</div>

</body>
</html>
