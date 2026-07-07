<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Login - Mahendra Secondary School</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Mahendra Secondary School</h1>
            <p class="text-gray-500 mt-1">Admin Panel Login</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            @if ($errors->any())
                <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
                            placeholder="admin@school.com">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
                            placeholder="Enter your password">
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm text-gray-600">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-[#b1002c] focus:ring-[#b1002c]">
                            Remember me
                        </label>
                    </div>
                    <button type="submit"
                        class="w-full py-2.5 bg-[#b1002c] text-white rounded-lg font-medium text-sm hover:bg-[#920022] transition-colors">
                        Sign In
                    </button>
                </div>
            </form>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            &copy; {{ date('Y') }} Mahendra Secondary School. All rights reserved.
        </p>
    </div>
</body>
</html>
