<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberSec News - Home</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
                        'neon-strong': '0 0 15px rgba(168, 85, 247, 0.7), 0 0 30px rgba(168, 85, 247, 0.4)',
                    }
                }
            }
        }
    </script>
</head>

<body class="antialiased min-h-screen flex flex-col font-sans bg-cyber-black text-white relative overflow-x-hidden">

    <div class="fixed bottom-0 right-0 w-[450px] h-[450px] bg-cyber-purple/30 rounded-full blur-[120px] pointer-events-none -z-10 translate-x-1/4 translate-y-1/4"></div>

    <nav class="w-full px-6 py-6 flex items-center justify-between z-50 bg-cyber-black/50 backdrop-blur-md sticky top-0 border-b border-white/5">
        <a href="{{ route('home') }}" class="flex items-center gap-2 group">
            <div class="text-cyber-purple text-3xl group-hover:text-cyber-purpleGlow transition-colors duration-300">
                <i class="fas fa-shield-halved"></i>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-12 text-sm font-light tracking-wide text-gray-300">
            <a href="{{ route('home') }}" class="text-cyber-purple font-bold uppercase">Newest</a>
            <a href="{{ route('analysis') }}" class="hover:text-cyber-purple transition-colors uppercase">Analysis</a>
            <a href="{{ route('cybersecurity') }}" class="hover:text-cyber-purple transition-colors uppercase">Cybersecurity</a>
            <a href="{{ route('opinion') }}" class="hover:text-cyber-purple transition-colors uppercase">Opinion</a>
        </div>

        <div class="flex items-center gap-6 text-gray-300 text-lg">
            <form action="{{ route('search') }}" method="GET" class="relative group inline-block mr-2">
                <input type="text" name="q" placeholder="Search..." 
                       class="bg-transparent border-b border-gray-600 focus:border-cyber-purple outline-none w-0 group-hover:w-32 focus:w-48 transition-all duration-300 text-sm py-1 text-white">
                <button type="submit" class="text-gray-300 hover:text-cyber-purple"><i class="fas fa-magnifying-glass"></i></button>
            </form>
            
            @auth
                <a href="{{ route('profile') }}" class="text-cyber-purple hover:text-white transition" title="My Profile">
                    <i class="fas fa-user-check"></i>
                </a>
            @else
                <a href="{{ route('login') }}" class="hover:text-cyber-purple transition" title="Login">
                    <i class="far fa-user"></i>
                </a>
            @endauth
            
            <button class="hover:text-cyber-purple transition"><i class="fas fa-rotate-right"></i></button>
            <button class="hover:text-cyber-purple transition"><i class="fas fa-bars"></i></button>
        </div>
    </nav>

    <main class="flex-grow px-6 md:px-12 lg:px-20 py-8 max-w-7xl mx-auto w-full z-10">
        <section class="relative w-full h-[500px] md:h-[600px] rounded-3xl overflow-hidden border border-cyber-purple/30 shadow-neon group cursor-pointer mb-20">
            <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=2070&auto=format&fit=crop" 
                 class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-cyber-black via-transparent to-transparent opacity-90"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-cyber-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-16 left-8 md:left-16 z-10 max-w-2xl">
                <h1 class="text-4xl md:text-6xl font-bold tracking-tight mb-2">
                    <span class="text-cyber-purple">Identity Security:</span> <span class="text-white">Your First and Last Line of Defense</span>
                </h1>
                <p class="text-gray-400 text-xl md:text-2xl font-light mb-8">Fully detailed explanation regarding defense system</p>
                <a href="{{ route('news.show') }}" class="inline-block px-8 py-3 rounded-full border border-cyber-purple text-gray-300 hover:bg-cyber-purple hover:text-white transition-all duration-300 shadow-[0_0_10px_rgba(168,85,247,0.2)]">Read More</a>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-4xl font-medium mb-8 text-white">Hot News</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <a href="{{ route('news.show') }}" class="block group">
                    <article class="bg-cyber-gray rounded-3xl overflow-hidden border-2 border-cyber-purple shadow-neon hover:shadow-neon-strong transition-all duration-300 hover:scale-105 h-full">
                        <div class="h-48 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-purple-900/20"></div>
                        </div>
                        <div class="p-6 bg-[#0a0a0a]">
                            <h3 class="text-2xl font-bold mb-2 text-white group-hover:text-cyber-purple transition-colors">AI-Powered Phishing Surge</h3>
                            <p class="text-sm text-gray-400">2hr ago &bull; <span class="text-gray-300">Social Engineering</span></p>
                        </div>
                    </article>
                </a>
                <a href="{{ route('news.show') }}" class="block group">
                    <article class="bg-cyber-gray rounded-3xl overflow-hidden border-2 border-cyber-purple shadow-neon hover:shadow-neon-strong transition-all duration-300 hover:scale-105 h-full">
                        <div class="h-48 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1510511459019-5dda7724fd87?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-purple-900/20"></div>
                        </div>
                        <div class="p-6 bg-[#0a0a0a]">
                            <h3 class="text-2xl font-bold mb-2 text-white group-hover:text-cyber-purple transition-colors">Project Midnight: Zero-Day</h3>
                            <p class="text-sm text-gray-400">2hr ago &bull; <span class="text-gray-300">Vulnerability</span></p>
                        </div>
                    </article>
                </a>
                <a href="{{ route('news.show') }}" class="block group">
                    <article class="bg-cyber-gray rounded-3xl overflow-hidden border-2 border-cyber-purple shadow-neon hover:shadow-neon-strong transition-all duration-300 hover:scale-105 h-full">
                        <div class="h-48 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-purple-900/20"></div>
                        </div>
                        <div class="p-6 bg-[#0a0a0a]">
                            <h3 class="text-2xl font-bold mb-2 text-white group-hover:text-cyber-purple transition-colors">DeFi Smart Contract Hack</h3>
                            <p class="text-sm text-gray-400">2hr ago &bull; <span class="text-gray-300">Crypto Security</span></p>
                        </div>
                    </article>
                </a>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-4xl font-medium mb-12 text-white">Most Discussed</h2>
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="hidden md:block w-1 h-64 bg-purple-800 rounded-full bg-gradient-to-b from-cyber-purple to-transparent"></div>
                <div class="flex-1 flex flex-col md:flex-row items-center gap-8 group">
                    <a href="{{ route('news.show') }}" class="w-full md:w-[500px] h-[280px] rounded-2xl overflow-hidden border border-cyber-purple shadow-neon relative shrink-0 block">
                        <img src="https://images.unsplash.com/photo-1614064641938-3e852943702d?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black via-black/80 to-transparent">
                             <h3 class="text-xl font-bold text-white">IoT Botnet Expansion</h3>
                             <p class="text-xs text-gray-400 mt-1">2hr ago &bull; Network Security</p>
                        </div>
                    </a>
                    <div class="flex-1">
                        <a href="{{ route('news.show') }}"><h3 class="text-4xl font-bold mb-4 text-white group-hover:text-cyber-purple transition-colors">IoT Botnet Expansion</h3></a>
                        <p class="text-xl text-gray-400 font-light">Millions of smart toothbrushes and fridges recruited into a massive DDoS botnet targeting ISPs.</p>
                        <div class="mt-6 flex gap-4">
                            <span class="px-3 py-1 rounded-full border border-gray-700 text-xs text-gray-400">#malware</span>
                            <span class="px-3 py-1 rounded-full border border-gray-700 text-xs text-gray-400">#security</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>