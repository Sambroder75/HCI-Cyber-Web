<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opini Publik</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        cyber: {
                            black: '#050505',
                            dark: '#0a0a0a',
                            gray: '#121212',
                            purple: '#a855f7', 
                            purpleLight: '#e9d5ff', 
                            purpleGlow: '#d8b4fe',
                        }
                    },
                    boxShadow: {
                        'neon': '0 0 10px rgba(168, 85, 247, 0.5)',
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-cyber-black min-h-screen text-white relative overflow-x-hidden">

    <!-- Fixed Glow -->
    <div class="fixed bottom-0 right-0 w-[450px] h-[450px] bg-cyber-purple/30 rounded-full blur-[120px] pointer-events-none -z-10 translate-x-1/4 translate-y-1/4"></div>

    <!-- NAVBAR -->
    <nav class="w-full px-6 py-6 flex items-center justify-between z-50 bg-cyber-black/50 backdrop-blur-md sticky top-0 border-b border-white/5">
        <a href="{{ route('home') }}" class="flex items-center gap-2 group">
            <div class="text-cyber-purple text-3xl group-hover:text-cyber-purpleGlow transition-colors duration-300">
                <i class="fas fa-shield-halved"></i>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-12 text-sm font-light tracking-wide text-gray-300">
            <a href="{{ route('news') }}" class="hover:text-cyber-purple transition-colors uppercase">Newest</a>
            <a href="{{ route('analysis') }}" class="hover:text-cyber-purple transition-colors uppercase">Analysis</a>
            <a href="{{ route('cybersecurity') }}" class="hover:text-cyber-purple transition-colors uppercase">Cybersecurity</a>
            <a href="{{ route('opinion') }}" class="text-cyber-purple font-bold uppercase">Opinion</a>
        </div>

        <div class="flex items-center gap-6 text-gray-300 text-lg">
            @auth
                <a href="{{ route('profile') }}" class="text-cyber-purple hover:text-white transition" title="My Profile">
                    <i class="fas fa-user-check"></i>
                </a>
            @else
                <a href="{{ route('login') }}" class="hover:text-cyber-purple transition" title="Login">
                    <i class="far fa-user"></i>
                </a>
            @endauth
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="px-6 md:px-12 lg:px-20 py-10 max-w-6xl mx-auto w-full">
        
        <!-- HEADER -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-8">
            <h1 class="text-3xl font-bold text-white shrink-0">Opini Publik</h1>
            
            <div class="flex items-center gap-4 w-full md:w-auto flex-1 justify-end">
                <!-- Search Input -->
                <div class="relative w-full md:w-80">
                    <form action="{{ route('opinion') }}" method="GET" class="relative w-full">
                        <input type="text" 
                               name="search"
                               placeholder="Cari opini..." 
                               value="{{ request('search') }}"
                               class="w-full bg-[#0f0f0f] border border-gray-700/50 text-gray-300 rounded-full py-2 pl-10 pr-4 text-sm focus:outline-none focus:border-cyber-purple focus:ring-1 focus:ring-cyber-purple transition-colors placeholder-gray-600">
                        <button type="submit" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 text-xs">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Tombol Action -->
                @auth
                    <a href="{{ route('createopinion') }}" class="px-6 py-2 rounded-full bg-cyber-purple text-white text-sm font-medium hover:bg-purple-600 transition-all shrink-0">
                        New Post
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 rounded-full border border-gray-600 text-sm font-medium hover:bg-gray-800 transition-all shrink-0">
                        Login
                    </a>
                @endauth
            </div>
        </div>

        <!-- Notifikasi -->
        @if (session('success'))
            <div class="p-4 mb-6 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 text-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- FEED LIST -->
        <div class="space-y-4">
            @forelse($opinions as $opinion)
            
            <article class="bg-[#0a0a0a] rounded-2xl border border-white/5 p-5 flex flex-col md:flex-row items-start md:items-center gap-6 hover:border-cyber-purple/30 transition-colors group">
                
                <!-- 1. FOTO PROFIL (Kiri) -->
                <div class="shrink-0">
                    @if($opinion->user->avatar)
                        <!-- Jika user punya foto profil, tampilkan foto -->
                        <img src="{{ asset('storage/' . $opinion->user->avatar) }}" 
                             alt="{{ $opinion->user->name }}" 
                             class="w-16 h-16 md:w-20 md:h-20 rounded-2xl object-cover shadow-lg border border-white/10">
                    @else
                        <!-- Jika tidak punya foto, tampilkan kotak inisial nama -->
                        <div class="w-16 h-16 md:w-20 md:h-20 rounded-2xl bg-gradient-to-br from-cyber-purple to-indigo-600 flex items-center justify-center text-2xl md:text-3xl font-bold text-white shadow-lg">
                            {{ substr($opinion->user->name, 0, 2) }} <!-- 2 Huruf Nama User -->
                        </div>
                    @endif
                </div>
                
                <!-- 2. KONTEN TENGAH -->
                <div class="flex-1 w-full min-w-0">
                    <h3 class="text-xl font-bold text-white mb-2 leading-tight group-hover:text-cyber-purpleLight transition-colors">
                        {{ $opinion->title }}
                    </h3>
                    
                    <p class="text-gray-400 text-sm mb-3 line-clamp-2 leading-relaxed">
                        {{ $opinion->text }}
                    </p>
                    
                    <div class="text-xs text-gray-500 font-medium">
                        {{ $opinion->created_at->format('d M Y') }} 
                        <span class="mx-1 text-gray-700">|</span> 
                        Oleh: <span class="text-gray-400 font-medium">{{ $opinion->user->name }}</span>
                    </div>
                </div>

                <!-- 3. VOTE HORIZONTAL (Kanan) -->
                <div class="shrink-0 flex items-center gap-6 md:gap-4 text-sm font-medium text-gray-400">
                    
                    @php
                        $userVote = auth()->user() ? auth()->user()->votes->where('opinion_id', $opinion->id)->first() : null;
                        $isUpvoted = $userVote && $userVote->type == 1;
                        $isDownvoted = $userVote && $userVote->type == -1;
                        
                        $upCount = $opinion->votes->where('type', 1)->count();
                        $downCount = $opinion->votes->where('type', -1)->count();
                    @endphp

                    <!-- UPVOTE -->
                    <div class="flex items-center gap-1.5">
                        <form action="{{ route('opinion.vote', ['opinion' => $opinion->id, 'type' => 1]) }}" method="POST">
                            @csrf
                            <button type="submit" class="hover:text-green-400 transition-colors {{ $isUpvoted ? 'text-green-400' : 'text-gray-500' }}">
                                <i class="fas fa-arrow-up text-lg"></i>
                            </button>
                        </form>
                        <span class="font-bold {{ $isUpvoted ? 'text-white' : 'text-gray-400' }}">{{ $upCount }}</span>
                    </div>

                    <!-- DOWNVOTE -->
                    <div class="flex items-center gap-1.5">
                        <span class="font-bold {{ $isDownvoted ? 'text-white' : 'text-gray-400' }}">{{ $downCount }}</span>
                        <form action="{{ route('opinion.vote', ['opinion' => $opinion->id, 'type' => -1]) }}" method="POST">
                            @csrf
                            <button type="submit" class="hover:text-red-400 transition-colors {{ $isDownvoted ? 'text-red-400' : 'text-gray-500' }}">
                                <i class="fas fa-arrow-down text-lg"></i>
                            </button>
                        </form>
                    </div>

                </div>

            </article>

            @empty
                <div class="text-center py-20 text-gray-500 border border-gray-800 rounded-2xl border-dashed">
                    <p class="text-lg">Belum ada opini yang diposting.</p>
                </div>
            @endforelse

        </div>
    </main>

</body>
</html>