<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News - Identity Security</title>
    
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
                    },
                    typography: (theme) => ({
                        DEFAULT: {
                            css: {
                                color: theme('colors.gray.300'),
                                h1: { color: theme('colors.white') },
                                h2: { color: theme('colors.white') },
                                h3: { color: theme('colors.white') },
                                strong: { color: theme('colors.white') },
                                a: { color: theme('colors.cyber.purple') },
                            },
                        },
                    }),
                }
            }
        }
    </script>
    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #a855f7; }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col font-sans bg-cyber-black text-white relative overflow-x-hidden">

    <div class="fixed top-0 left-0 w-[500px] h-[500px] bg-cyber-purple/10 rounded-full blur-[120px] pointer-events-none -z-10 translate-x-[-50%] translate-y-[-50%]"></div>

    <nav class="w-full px-6 py-6 flex items-center justify-between z-50 bg-cyber-black/80 backdrop-blur-md sticky top-0 border-b border-white/5">
        <a href="{{ route('home') }}" class="text-cyber-purple text-3xl hover:text-cyber-purpleGlow transition-colors"><i class="fas fa-shield-halved"></i></a>
        
        <div class="hidden md:flex items-center gap-12 text-sm font-light tracking-wide text-gray-300">
            <a href="{{ route('home') }}" class="hover:text-cyber-purple transition-colors uppercase">Newest</a>
            <a href="{{ route('analysis') }}" class="hover:text-cyber-purple transition-colors uppercase">Analysis</a>
            <a href="{{ route('cybersecurity') }}" class="hover:text-cyber-purple transition-colors uppercase">Cybersecurity</a>
            <a href="{{ route('opinion') }}" class="hover:text-cyber-purple transition-colors uppercase">Opinion</a>
        </div>

        <div class="flex items-center gap-6 text-gray-300 text-lg">
             <form action="{{ route('search') }}" method="GET" class="relative group inline-block mr-4">
                <input type="text" name="q" placeholder="Search..." 
                class="bg-transparent border-b border-gray-600 focus:border-cyber-purple outline-none w-0 group-hover:w-32 focus:w-48 transition-all duration-300 text-sm py-1 text-white">
                <button type="submit" class="text-gray-300 hover:text-cyber-purple"><i class="fas fa-magnifying-glass"></i></button>
            </form>
             @auth
                <a href="{{ route('profile') }}" class="text-cyber-purple"><i class="fas fa-user-check"></i></a>
             @else
                <a href="{{ route('login') }}" class="hover:text-cyber-purple transition"><i class="far fa-user"></i></a>
             @endauth
        </div>
    </nav>

    <main class="flex-grow px-4 md:px-12 lg:px-20 py-10 max-w-7xl mx-auto w-full z-10 grid grid-cols-1 lg:grid-cols-3 gap-12">

        <div class="lg:col-span-2">
            
            <div class="mb-4 flex items-center gap-2 text-sm">
                <a href="#" class="text-cyber-purple font-bold uppercase tracking-widest hover:underline">Identity Security</a>
                <span class="text-gray-600">/</span>
                <span class="text-gray-500">Analysis</span>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Identity Security: Your First and Last Line of Defense</h1>
            
            <div class="flex items-center gap-4 mb-8 text-gray-400 text-sm border-b border-white/10 pb-8">
                <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-cyber-purple to-blue-600 p-[2px]">
                    <div class="w-full h-full rounded-full bg-black overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name=Angelina+Schmidt&background=000&color=fff" class="w-full h-full object-cover">
                    </div>
                </div>
                <div>
                    <span class="block text-white font-semibold text-base">Angelina Schmidt</span>
                    <span class="text-xs uppercase tracking-wide">Oct 25, 2025 • 5 min read</span>
                </div>
                <div class="ml-auto flex gap-3">
                    <button class="w-8 h-8 rounded-full bg-[#1a1a1a] flex items-center justify-center hover:text-cyber-purple transition"><i class="fab fa-twitter"></i></button>
                    <button class="w-8 h-8 rounded-full bg-[#1a1a1a] flex items-center justify-center hover:text-cyber-purple transition"><i class="fab fa-linkedin-in"></i></button>
                </div>
            </div>

            <div class="w-full h-[400px] rounded-2xl overflow-hidden mb-10 border border-cyber-purple/30 shadow-neon group">
                <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2070" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            </div>

            <article class="prose prose-invert prose-lg max-w-none text-gray-300 leading-relaxed">
                <p class="mb-6 first-letter:text-5xl first-letter:font-bold first-letter:text-cyber-purple first-letter:float-left first-letter:mr-3">
                    Remember those old-school security models built around firewalls and endpoint protection? They served their purpose once—but they weren't designed for the distributed, identity-driven future we face today. In the modern landscape, identity has become the new perimeter.
                </p>
                <p class="mb-6">
                    Attackers are no longer hacking in; they are logging in. Credentials are the primary target, and once compromised, they offer the keys to the kingdom. This shift necessitates a fundamental rethinking of how we approach security architecture.
                </p>
                <h3 class="text-2xl text-white font-bold mb-4 mt-8">Not How Long, But How Well</h3>
                <blockquote class="border-l-4 border-cyber-purple pl-6 italic text-xl text-gray-400 my-8 bg-[#111] py-4 rounded-r-lg">
                    "Identity is the control plane for digital transformation."
                </blockquote>
                <p class="mb-6">
                    Implementing robust Multi-Factor Authentication (MFA) is the baseline, but adaptive authentication based on risk signals—such as login location, device health, and impossible travel—is where true security lies.
                </p>
            </article>

            <div class="mt-16 pt-10 border-t border-white/10">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-bold text-white">Comments <span class="text-cyber-purple">({{ $comments->count() }})</span></h3>
                    <div class="text-sm text-gray-400">Sort by: <span class="text-white font-bold cursor-pointer">Newest</span></div>
                </div>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 text-green-400 rounded-xl text-sm font-medium flex items-center gap-2">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif
                
                @auth
                    <div class="bg-[#0a0a0a] p-6 rounded-2xl border border-white/10 mb-10 shadow-lg">
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-full bg-gray-700 flex-shrink-0 overflow-hidden border border-white/10">
                                    @if(Auth::user()->avatar)
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-full h-full object-cover">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=333&color=fff" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="flex-grow">
                                    <textarea name="content" class="w-full bg-[#151515] text-white p-4 rounded-xl border border-white/10 focus:border-cyber-purple outline-none transition-colors min-h-[100px]" placeholder="Add to the discussion..." required></textarea>
                                    @error('content')
                                        <span class="text-red-500 text-xs mt-2 block pl-2"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</span>
                                    @enderror
                                    <div class="flex justify-end mt-3">
                                        <button type="submit" class="bg-white text-black font-bold px-6 py-2 rounded-full hover:bg-cyber-purple hover:text-white transition-all shadow-lg text-sm">Post Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="bg-[#0a0a0a] p-8 rounded-2xl border border-white/10 mb-10 text-center">
                        <div class="text-cyber-purple text-3xl mb-3"><i class="fas fa-comments"></i></div>
                        <h4 class="text-white font-bold text-lg mb-2">Join the Conversation</h4>
                        <p class="text-gray-400 mb-6 text-sm">You must be logged in to post a comment and interact with the community.</p>
                        <a href="{{ route('login') }}" class="inline-block bg-white text-black font-bold px-8 py-3 rounded-full hover:bg-cyber-purple hover:text-white transition-colors">Login Now</a>
                    </div>
                @endauth

                <div class="space-y-8">
                    @forelse($comments as $comment)
                        <div class="flex gap-4 group">
                            <div class="w-10 h-10 rounded-full bg-gray-700 flex-shrink-0 border border-white/10 overflow-hidden">
                                @if($comment->user->avatar)
                                    <img src="{{ asset('storage/' . $comment->user->avatar) }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&background=random" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-bold text-white text-sm">{{ $comment->user->name }}</span>
                                    <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-300 text-sm leading-relaxed">{{ $comment->content }}</p>
                                <div class="flex gap-4 mt-2 text-xs text-gray-500 font-bold opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="hover:text-cyber-purple transition-colors">Reply</button>
                                    <button class="hover:text-cyber-purple transition-colors">Like</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-500 py-10 bg-[#0a0a0a] rounded-2xl border border-white/5 border-dashed">
                            No comments yet. Be the first to start the conversation!
                        </div>
                    @endforelse
                </div>
            </div>
            </div>

        <aside class="space-y-10">
            <div class="relative group">
                <input type="text" placeholder="Search articles..." class="w-full bg-[#0a0a0a] border border-white/10 rounded-full py-3 px-6 pl-12 focus:border-cyber-purple focus:ring-1 focus:ring-cyber-purple outline-none text-white transition-all">
                <i class="fas fa-search absolute left-5 top-3.5 text-gray-500 group-focus-within:text-cyber-purple transition-colors"></i>
            </div>

            <div class="bg-[#0a0a0a] p-6 rounded-2xl border border-white/10">
                <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-cyber-purple rounded-full"></span>
                    Top Posts
                </h3>
                <div class="space-y-6">
                    <a href="#" class="flex gap-4 group cursor-pointer items-center">
                        <div class="w-20 h-16 rounded-lg overflow-hidden shrink-0">
                            <img src="https://images.unsplash.com/photo-1510511459019-5dda7724fd87?q=80&w=300" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-gray-200 group-hover:text-cyber-purple transition line-clamp-2">Virus Sigma Analysis: Deep Dive</h4>
                            <span class="text-xs text-gray-500 mt-1 block"><i class="far fa-eye mr-1"></i> 2.4k views</span>
                        </div>
                    </a>
                    
                    <a href="#" class="flex gap-4 group cursor-pointer items-center">
                        <div class="w-20 h-16 rounded-lg overflow-hidden shrink-0">
                            <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=300" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-gray-200 group-hover:text-cyber-purple transition line-clamp-2">Understanding Zero Trust Architecture</h4>
                            <span class="text-xs text-gray-500 mt-1 block"><i class="far fa-eye mr-1"></i> 1.8k views</span>
                        </div>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Trending Tags</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="px-4 py-2 bg-[#0a0a0a] border border-white/10 rounded-full text-xs text-gray-400 hover:border-cyber-purple hover:text-white hover:bg-cyber-purple/10 transition-all">#Malware</a>
                    <a href="#" class="px-4 py-2 bg-[#0a0a0a] border border-white/10 rounded-full text-xs text-gray-400 hover:border-cyber-purple hover:text-white hover:bg-cyber-purple/10 transition-all">#Security</a>
                    <a href="#" class="px-4 py-2 bg-[#0a0a0a] border border-white/10 rounded-full text-xs text-gray-400 hover:border-cyber-purple hover:text-white hover:bg-cyber-purple/10 transition-all">#Crypto</a>
                </div>
            </div>

            <div class="relative h-72 rounded-2xl overflow-hidden border border-white/10 group cursor-pointer">
                <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-cyber-purple/90 to-transparent flex flex-col justify-end p-6">
                    <span class="text-xs font-bold bg-white text-black px-2 py-1 rounded w-fit mb-2">AD</span>
                    <h3 class="text-xl font-bold mb-1">Secure Your Future</h3>
                    <p class="text-sm text-gray-200">Join the leading cybersecurity conference in Jakarta.</p>
                </div>
            </div>
        </aside>

    </main>

    <footer class="bg-[#0a0a0a] border-t border-white/5 py-12 mt-auto">
        <div class="max-w-7xl mx-auto px-6 text-center text-gray-500 text-xs">
            &copy; 2025 CyberSec News. All rights reserved.
        </div>
    </footer>

</body>
</html>