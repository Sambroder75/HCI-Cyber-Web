<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: { cyber: { black: '#050505', purple: '#a855f7' } }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #050505; }
        .glass-card {
            background: rgba(26, 26, 26, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-cyber-black min-h-screen flex flex-col items-center justify-center relative overflow-hidden text-white">

    <div class="fixed bottom-0 right-0 w-[450px] h-[450px] bg-cyber-purple/30 rounded-full blur-[120px] -z-10 translate-x-1/4 translate-y-1/4"></div>

    <div class="w-full max-w-lg p-6 z-10">
        
        <a href="{{ route('home') }}" class="inline-flex items-center text-gray-400 hover:text-white mb-6 transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Beranda
        </a>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="glass-card rounded-3xl p-10 shadow-2xl w-full text-center relative overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-cyber-purple to-transparent opacity-50"></div>

            <div class="w-24 h-24 mx-auto rounded-full mb-6 shadow-[0_0_20px_rgba(168,85,247,0.4)] border-2 border-white/20 overflow-hidden flex items-center justify-center bg-gradient-to-br from-cyber-purple to-blue-600">
                @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                @else
                    <span class="text-3xl font-bold">{{ substr($user->name, 0, 1) }}</span>
                @endif
            </div>

            <h1 class="text-3xl font-bold text-white mb-2">{{ $user->name }}</h1>
            
            @if($user->bio)
                <p class="text-gray-300 mb-6 max-w-sm mx-auto italic">"{{ $user->bio }}"</p>
            @else
                <p class="text-gray-500 mb-6 max-w-sm mx-auto italic text-sm">Belum ada bio. Edit profil Anda untuk menambahkan deskripsi.</p>
            @endif

            <p class="text-gray-400 mb-6">{{ $user->email }}</p>

            <div class="flex justify-center gap-4 mb-8">
                <div class="px-4 py-2 rounded-full bg-white/5 border border-white/10 text-xs text-gray-300">
                    Bergabung Sejak: {{ $user->created_at->format('M Y') }}
                </div>
            </div>

            <div class="space-y-3">
                <a href="{{ route('profile.edit') }}" class="block w-full py-3 rounded-xl bg-white text-black font-semibold hover:bg-gray-200 transition-colors">
                    Edit Profil
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-3 rounded-xl border border-red-500/50 text-red-400 font-semibold hover:bg-red-500/10 transition-colors">
                        Keluar (Logout)
                    </button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>