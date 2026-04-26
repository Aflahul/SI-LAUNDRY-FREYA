<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freya Laundry | Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('asset/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/all.css') }}" rel="stylesheet">
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center p-4" style="background-image: linear-gradient(rgba(7, 3, 26, 0.6), rgba(7, 3, 26, 0.6)), url('/asset/img/freya/1copy.jpeg');">
    
    <div class="w-full max-w-md animate-fade-in-up">
        <div class="glass p-8 rounded-[2.5rem] shadow-2xl border border-white/20">
            <!-- Logo Section -->
            <div class="flex justify-center mb-8">
                <div class="p-4 bg-white/10 rounded-3xl backdrop-blur-md border border-white/20 shadow-inner">
                    <img class="h-20 w-auto rounded-2xl shadow-lg" src="asset/img/logo.jpg" alt="logo">
                </div>
            </div>

            <!-- Welcome Text -->
            <div class="text-center mb-10">
                <h3 class="text-3xl font-black text-white tracking-tight mb-2">Hello, Freyers!</h3>
                <p class="text-white/60 text-sm">Please enter your credentials to continue</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->has('loginError'))
                <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-2xl text-red-200 text-sm text-center backdrop-blur-sm animate-shake">
                    {{ $errors->first('loginError') }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div class="space-y-4">
                    <!-- Username -->
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-white/40 group-focus-within:text-kuning transition-colors">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" placeholder="Username" name="username" required
                            class="w-full pl-12 pr-4 py-4 bg-white/10 border border-white/10 rounded-2xl text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-kuning/50 focus:bg-white/20 transition-all duration-300" />
                    </div>

                    <!-- Password -->
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-white/40 group-focus-within:text-kuning transition-colors">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" placeholder="Password" required
                            class="w-full pl-12 pr-4 py-4 bg-white/10 border border-white/10 rounded-2xl text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-kuning/50 focus:bg-white/20 transition-all duration-300" />
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-4 bg-kuning hover:bg-yellow-400 text-garis font-black rounded-2xl shadow-xl shadow-kuning/20 transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] uppercase tracking-widest text-sm">
                    Sign In
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-white/40 text-xs">© {{ date('Y') }} Freya Laundry Management System</p>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        .animate-shake {
            animation: shake 0.4s ease-in-out;
        }
    </style>
</body>

</html>
