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
                    boxShadow: { 'neon': '0 0 10px rgba(168, 85, 247, 0.5)' }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-cyber-black min-h-screen text-white relative overflow-x-hidden font-sans">

    <div class="fixed bottom-0 right-0 w-[450px] h-[450px] bg-cyber-purple/30 rounded-full blur-[120px] pointer-events-none -z-10 translate-x-1/4 translate-y-1/4"></div>

    <nav class="w-full px-6 py-6 flex items-center justify-between z-50 bg-cyber-black/50 backdrop-blur-md sticky top-0 border-b border-white/5">
        <a href="{{ route('home') }}" class="text-cyber-purple text-3xl hover:text-cyber-purpleGlow transition"><i class="fas fa-shield-halved"></i></a>
        <div class="hidden md:flex items-center gap-12 text-sm font-light tracking-wide text-gray-300">
            <a href="{{ route('home') }}" class="hover:text-cyber-purple uppercase">Newest</a>
            <a href="{{ route('analysis') }}" class="hover:text-cyber-purple uppercase">Analysis</a>
            <a href="{{ route('cybersecurity') }}" class="hover:text-cyber-purple uppercase">Cybersecurity</a>
            <a href="{{ route('opinion') }}" class="text-cyber-purple font-bold uppercase">Opinion</a>
        </div>
        <div class="flex items-center gap-6 text-gray-300 text-lg">
            @auth
                <a href="{{ route('profile') }}" class="text-cyber-purple"><i class="fas fa-user-check"></i></a>
            @else
                <a href="{{ route('login') }}"><i class="far fa-user"></i></a>
            @endauth
        </div>
    </nav>

    <main class="px-6 md:px-12 lg:px-20 py-10 max-w-6xl mx-auto w-full">
        
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-8">
            <h1 class="text-3xl font-bold text-white shrink-0">Public Opinion</h1>
            
            <div class="flex items-center gap-4 w-full md:w-auto flex-1 justify-end">
                <form action="{{ route('opinion') }}" method="GET" class="relative w-full md:w-80">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    
                    <input type="text" name="search" placeholder="Search opinion..." value="{{ request('search') }}"
                           class="w-full bg-[#0f0f0f] border border-gray-700/50 text-gray-300 rounded-full py-2 pl-10 pr-4 text-sm focus:border-cyber-purple focus:ring-1 focus:ring-cyber-purple outline-none transition-colors">
                    <button type="submit" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 text-xs"><i class="fas fa-search"></i></button>
                </form>

                @auth
                    <a href="{{ route('createopinion') }}" class="px-6 py-2 rounded-full bg-cyber-purple text-white text-sm font-bold hover:bg-purple-600 transition shadow-neon">New Post</a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 rounded-full border border-gray-600 text-sm hover:bg-gray-800 transition">Login</a>
                @endauth
            </div>
        </div>

        <div class="flex flex-wrap gap-3 mb-8 border-b border-white/10 pb-4">
            @php
                $categories = ['All', 'General', 'Cybersecurity', 'Network', 'Hardware', 'Programming'];
                $currentCat = request('category', 'All');
            @endphp

            @foreach($categories as $cat)
                <a href="{{ route('opinion', ['category' => $cat, 'search' => request('search')]) }}" 
                   class="px-4 py-1.5 rounded-full text-sm font-medium transition-all 
                   {{ $currentCat == $cat 
                       ? 'bg-cyber-purple text-black shadow-neon' 
                       : 'bg-[#1a1a1a] text-gray-400 hover:text-white hover:bg-[#252525]' 
                   }}">
                   {{ $cat }}
                </a>
            @endforeach
        </div>
        @if (session('success'))
            <div class="p-4 mb-6 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 text-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-4">
            @forelse($opinions as $opinion)
            <article class="bg-[#0a0a0a] rounded-2xl border border-white/5 p-5 flex flex-col md:flex-row items-start gap-6 hover:border-cyber-purple/30 transition-colors group relative overflow-hidden">
                
                <span class="absolute top-4 right-4 text-[10px] uppercase tracking-wider font-bold text-gray-500 border border-gray-800 px-2 py-1 rounded bg-black">
                    {{ $opinion->category }}
                </span>

                <div class="shrink-0 mt-2">
                    @if($opinion->user->avatar)
                        <img src="{{ asset('storage/' . $opinion->user->avatar) }}" class="w-14 h-14 rounded-xl object-cover border border-white/10">
                    @else
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-cyber-purple to-indigo-900 flex items-center justify-center text-xl font-bold text-white">
                            {{ substr($opinion->user->name, 0, 2) }}
                        </div>
                    @endif
                </div>
                
                <div class="flex-1 w-full min-w-0">
                    <h3 class="text-xl font-bold text-white mb-2 leading-tight group-hover:text-cyber-purpleLight transition-colors cursor-pointer">
                        {{ $opinion->title }}
                    </h3>
                    <p class="text-gray-400 text-sm mb-3 line-clamp-2 leading-relaxed">
                        {{ $opinion->text }}
                    </p>
                    <div class="text-xs text-gray-500 font-medium flex items-center gap-2">
                        <span class="text-cyber-purple">{{ $opinion->user->name }}</span>
                        <span>&bull;</span>
                        <span>{{ $opinion->created_at->diffForHumans() }}</span>
                    </div>
                </div>

                <div class="shrink-0 flex items-center gap-4 text-sm font-medium text-gray-400 border-l border-white/5 pl-4 md:self-center">
                    
                    @php
                        // 1. Cek Vote User Login (untuk mewarnai tombol)
                        $userVote = auth()->user() ? auth()->user()->votes->where('opinion_id', $opinion->id)->first() : null;
                        $isUpvoted = $userVote && $userVote->type == 1;
                        $isDownvoted = $userVote && $userVote->type == -1;
                        
                        // 2. Hitung Total (untuk angka)
                        $upCount = $opinion->votes->where('type', 1)->count();
                        $downCount = $opinion->votes->where('type', -1)->count();
                    @endphp

                    <div class="flex flex-col items-center">
                        <form action="{{ route('opinion.vote', ['opinion' => $opinion->id, 'type' => 1]) }}" method="POST">
                            @csrf
                            <button type="submit" class="hover:text-green-400 transition {{ $isUpvoted ? 'text-green-400' : 'text-gray-500' }}">
                                <i class="fas fa-chevron-up text-xl"></i>
                            </button>
                        </form>
                        <span class="font-bold {{ $isUpvoted ? 'text-white' : 'text-gray-400' }}">{{ $upCount }}</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <form action="{{ route('opinion.vote', ['opinion' => $opinion->id, 'type' => -1]) }}" method="POST">
                            @csrf
                            <button type="submit" class="hover:text-red-400 transition {{ $isDownvoted ? 'text-red-400' : 'text-gray-500' }}">
                                <i class="fas fa-chevron-down text-xl"></i>
                            </button>
                        </form>
                        <span class="font-bold {{ $isDownvoted ? 'text-white' : 'text-gray-400' }}">{{ $downCount }}</span>
                    </div>

                </div>

            </article>
            @empty
                <div class="text-center py-20 text-gray-500 border border-gray-800 rounded-2xl border-dashed">
                    <p class="text-lg">Belum ada opini di kategori ini.</p>
                </div>
            @endforelse
        </div>
    </main>
</body>
</html>