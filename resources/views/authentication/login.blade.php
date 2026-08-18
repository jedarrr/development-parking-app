<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Parking</title>
    <!-- load tailwind via vite build asset -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center bg-white antialiased">

    <div class="w-full max-w-[460px] px-6 py-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-2xl font-semibold text-[#1E3A8A]">Login</h2>
            <p class="text-xs text-gray-500 mt-1">Sign in to your account</p>
        </div>

        <!-- Form Login -->
        <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Input Username / Email -->
            <div>
                <label for="username" class="block text-xs font-semibold text-gray-700 mb-2">Username</label>
                <div class="relative">
                    <input type="text" id="username" name="username" placeholder="Username" required
                        class="w-full px-4 py-3 text-sm text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition-all">
                </div>
            </div>

            <!-- Input Password -->
            <div>
                <label for="password" class="block text-xs font-semibold text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Password" required
                        class="w-full px-4 py-3 text-sm text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 transition-all">
                    
                    <!-- Icon Visibility Toggle (Mata) -->
                    <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                
                <!-- Forgot Password -->
                <div class="text-right mt-2">
                    <a href="#" class="text-[11px] text-blue-600 hover:underline">Forgot Password?</a>
                </div>
            </div>

            <!-- Button Submit -->
            <div class="pt-2">
                <button type="submit" 
                    class="w-full py-3 bg-blue-700 t hover:bg-[#2e1eb0] text-white font-medium text-sm rounded-lg transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3B28CC]">
                    Login
                </button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="text-center mt-5">
            <p class="text-xs text-gray-500">
                Don't have an account? <a href="#" class="text-blue-600 font-medium hover:underline">Sign Up</a>
            </p>
        </div>

        <!-- Divider & Social Login -->
        <div class="mt-8 flex justify-center space-x-8">
            <!-- Google Button Alternative -->
            <button class="flex flex-col items-center group">
                <div class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-full bg-white group-hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="#EA4335" d="M5.266 9.765A7.077 7.077 0 0112 4.909c1.69 0 3.218.6 4.418 1.582L19.91 3C17.782 1.145 15.055 0 12 0 7.273 0 3.19 2.7 1.24 6.66l4.026 3.105z"/>
                        <path fill="#4285F4" d="M16.04 15.345c-1.077.732-2.432 1.164-4.04 1.164-3.555 0-6.58-2.436-7.655-5.727L4.32 13.88c1.95 3.96 6.037 6.66 10.764 6.66 3.136 0 5.927-1.127 8.01-3.055l-3.972-3.145z"/>
                        <path fill="#34A853" d="M23.09 12c0-.773-.082-1.536-.227-2.273H12v4.51h6.218a5.32 5.32 0 01-2.29 3.49l3.973 3.146C22.218 18.736 23.09 15.655 23.09 12z"/>
                        <path fill="#FBBC05" d="M4.32 13.88c-.245-.74-.386-1.532-.386-2.355 0-.823.14-1.614.386-2.355L4.3 6.064c-.79 1.6-1.24 3.395-1.24 5.29 0 1.897.45 3.69 1.24 5.292l4.02-3.105z"/>
                    </svg>
                </div>
                <span class="text-[10px] text-gray-500 mt-1">Google</span>
            </button>

            <!-- Apple Button Alternative -->
            <button class="flex flex-col items-center group">
                <div class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-full bg-white group-hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.152 6.896c-.948 0-2.415-1.078-3.96-1.05-2.04.029-3.91 1.183-4.961 3.014-2.117 3.675-.54 9.103 1.51 12.06 1.004 1.45 2.192 3.075 3.774 3.02 1.52-.062 2.095-.98 3.935-.98 1.83 0 2.35.98 3.944.947 1.62-.029 2.645-1.474 3.633-2.91 1.144-1.664 1.613-3.275 1.637-3.357-.033-.016-3.142-1.2-3.175-4.764-.025-2.984 2.453-4.417 2.566-4.484-1.402-2.05-3.565-2.274-4.326-2.327-1.92-.156-3.09 1.05-3.985 1.05zM15.42 3.864c.8-1 1.341-2.385 1.193-3.766-1.184.048-2.617.788-3.467 1.776-.757.873-1.42 2.274-1.24 3.633 1.32.102 2.666-.632 3.514-1.643z"/>
                    </svg>
                </div>
                <span class="text-[10px] text-gray-500 mt-1">Apple</span>
            </button>
        </div>
    </div>

</body>
</html>
