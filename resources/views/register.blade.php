<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
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
        
        <div class="glass-card rounded-2xl p-8 shadow-2xl w-full bg-[#1a1a1a]/50 backdrop-blur-md border border-white/10">
            
            <h2 class="text-3xl font-bold text-white text-center mb-8">Register</h2>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="mb-5">
                    <div class="relative">
                        <input type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               placeholder="Full Name" 
                               class="w-full bg-[#1a1a1a] text-gray-200 border border-gray-700 rounded-full py-3 px-5 pr-10 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition-colors placeholder-gray-400"
                               required autofocus>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="fa-regular fa-id-card text-gray-400"></i>
                        </div>
                    </div>
                    @error('name')
                        <span class="text-red-400 text-xs mt-1 ml-4 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <div class="relative">
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="Email Address" 
                               class="w-full bg-[#1a1a1a] text-gray-200 border border-gray-700 rounded-full py-3 px-5 pr-10 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition-colors placeholder-gray-400"
                               required>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="fa-regular fa-envelope text-gray-400"></i>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-red-400 text-xs mt-1 ml-4 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <div class="relative">
                        <input type="password" 
                               name="password" 
                               placeholder="Password" 
                               class="w-full bg-[#1a1a1a] text-gray-200 border border-gray-700 rounded-full py-3 px-5 pr-10 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition-colors placeholder-gray-400"
                               required>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-red-400 text-xs mt-1 ml-4 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-8">
                    <div class="relative">
                        <input type="password" 
                               name="password_confirmation" 
                               placeholder="Confirm Password" 
                               class="w-full bg-[#1a1a1a] text-gray-200 border border-gray-700 rounded-full py-3 px-5 pr-10 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition-colors placeholder-gray-400"
                               required>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-check-double text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-white text-black font-bold py-3 rounded-full hover:bg-gray-200 transition-colors mb-6">
                    Register
                </button>

                <div class="text-center text-sm text-gray-300 mb-6">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-bold text-white hover:underline">Login</a>
                </div>

                <a href="{{ route('home') }}" class="block w-full text-center border border-gray-600 text-white py-2 rounded-lg hover:bg-white/10 transition-colors">
                    Home
                </a>

            </form>
        </div>
    </div>

</body>
</html>