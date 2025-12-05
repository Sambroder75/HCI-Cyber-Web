<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                        'neon': '0 0 10px rgba(168, 85, 247, 0.5), 0 0 20px rgba(168, 85, 247, 0.3)',
                    }
                }
            }
        }
    </script>
</head>
<body class="antialiased min-h-screen flex flex-col font-sans bg-cyber-black text-white relative overflow-x-hidden">

    <!-- Navbar -->
    <nav class="w-full px-6 py-6 flex items-center justify-between z-50 bg-cyber-black/80 backdrop-blur-md sticky top-0 border-b border-white/5">
        <a href="{{ route('home') }}" class="text-cyber-purple text-3xl hover:text-cyber-purpleGlow transition-colors"><i class="fas fa-shield-halved"></i></a>
        
        <div class="hidden md:flex items-center gap-12 text-sm font-light tracking-wide text-gray-300">
            <a href="{{ route('home') }}" class="hover:text-cyber-purple transition-colors uppercase">Newest</a>
            <a href="{{ route('analysis') }}" class="hover:text-cyber-purple transition-colors uppercase">Analysis</a>
            <a href="{{ route('cybersecurity') }}" class="hover:text-cyber-purple transition-colors uppercase">Cybersecurity</a>
            <a href="{{ route('opinion') }}" class="hover:text-cyber-purple transition-colors uppercase">Opinion</a>
        </div>

        <div class="flex items-center gap-6 text-gray-300 text-lg">
             <!-- Search Form in Navbar -->
             <form action="{{ route('search') }}" method="GET" class="relative group">
                <input type="text" name="q" placeholder="Search..." value="{{ request('q') }}"
                       class="bg-transparent border-b border-gray-600 focus:border-cyber-purple outline-none w-32 focus:w-48 transition-all text-sm py-1">
                <button type="submit" class="absolute right-0 top-1 text-gray-400 hover:text-cyber-purple"><i class="fas fa-magnifying-glass"></i></button>
             </form>

             @auth
                <a href="{{ route('profile') }}" class="text-cyber-purple"><i class="fas fa-user-check"></i></a>
             @else
                <a href="{{ route('login') }}" class="hover:text-cyber-purple transition"><i class="far fa-user"></i></a>
             @endauth
        </div>
    </nav>

    <main class="flex-grow px-6 md:px-12 lg:px-20 py-12 max-w-7xl mx-auto w-full z-10">
        
        <!-- Header -->
        <div class="mb-12 border-b border-white/10 pb-8">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Search Results</h1>
            <p class="text-gray-400">
                Showing results for: <span class="text-cyber-purple font-bold">"{{ $query }}"</span>
            </p>
        </div>

        <!-- Results Grid -->
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <a href="{{ route('news.show') }}" class="block group h-full">
                    <article class="bg-[#0a0a0a] rounded-3xl overflow-hidden border border-white/10 hover:border-cyber-purple hover:shadow-neon transition-all duration-300 h-full flex flex-col">
                        <!-- Category Badge -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $post->image ?? 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2070' }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-4 left-4 bg-cyber-purple text-black text-xs font-bold px-3 py-1 rounded-full uppercase">
                                {{ $post->category }}
                            </div>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold mb-3 text-white group-hover:text-cyber-purple transition-colors line-clamp-2">
                                {{ $post->title }}
                            </h3>
                            <p class="text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">
                                {{ Str::limit($post->content, 100) }}
                            </p>
                            <div class="flex items-center justify-between text-xs text-gray-500 border-t border-white/5 pt-4 mt-auto">
                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                <span>by {{ $post->author }}</span>
                            </div>
                        </div>
                    </article>
                </a>
                @endforeach
            </div>
        @else
            <!-- No Results State -->
            <div class="flex flex-col items-center justify-center py-20 text-center">
                <div class="w-24 h-24 bg-gray-800 rounded-full flex items-center justify-center mb-6 text-gray-600 text-4xl">
                    <i class="fas fa-search"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">No results found</h2>
                <p class="text-gray-400 max-w-md">
                    We couldn't find any articles matching "<span class="text-white">{{ $query }}</span>". Try searching for different keywords or check your spelling.
                </p>
                <a href="{{ route('home') }}" class="mt-8 px-8 py-3 bg-cyber-purple text-black font-bold rounded-full hover:bg-white transition-colors">
                    Back to Home
                </a>
            </div>
        @endif

    </main>

    <footer class="bg-[#0a0a0a] border-t border-white/5 py-10 mt-auto text-center text-gray-500 text-sm">
        &copy; 2025 CyberSec News. All rights reserved.
    </footer>

</body>
</html>