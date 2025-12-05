<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        cyber: {
                            black: '#050505',
                            dark: '#0a0a0a',
                            gray: '#121212',
                            purple: '#a855f7', 
                            purpleLight: '#e9d5ff', 
                            purpleGlow: '#d8b4fe',
                        }
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body class="bg-cyber-black min-h-screen flex items-center justify-center relative overflow-hidden text-white">

    <div class="fixed bottom-0 right-0 w-[450px] h-[450px] bg-cyber-purple/30 rounded-full blur-[120px] pointer-events-none -z-10 translate-x-1/4 translate-y-1/4"></div>

    <div class="w-full max-w-md p-6 z-10">
        
        <div class="glass-card rounded-2xl p-8 shadow-2xl w-full">
            
            <h2 class="text-2xl font-bold text-white text-center mb-4">Forgot Password?</h2>
            
            <p class="text-gray-400 text-center text-sm mb-8">
                No problem. Just enter your email address and we will email you a password reset link.
            </p>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-400 text-center bg-green-400/10 py-2 rounded-lg border border-green-400/20">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                
                <div class="mb-6 relative">
                    <input type="email" 
                           name="email" 
                           placeholder="Email Address" 
                           class="w-full input-field border rounded-full py-3 px-5 pr-10 transition-colors placeholder-gray-400"
                           required autofocus>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <i class="fa-regular fa-envelope text-gray-400"></i>
                    </div>
                    @error('email')
                        <span class="text-red-500 text-xs mt-2 block pl-2">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-white text-black font-bold py-3 rounded-full hover:bg-gray-200 transition-colors mb-6">
                    Send Password Reset Link
                </button>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white transition-colors flex items-center justify-center gap-2">
                        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Login
                    </a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>