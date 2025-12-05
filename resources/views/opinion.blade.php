<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinion - CyberSec</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        cyber: { black: '#050505', purple: '#a855f7' }
                    },
                    backgroundImage: {
                        'grid-pattern': "linear-gradient(to right, #1a1a1a 1px, transparent 1px), linear-gradient(to bottom, #1a1a1a 1px, transparent 1px)",
                    }
                }
            }
        }
    </script>
    <style>
        .bg-grid { background-size: 40px 40px; }
    </style>
</head>
<body class="bg-cyber-black text-white font-sans min-h-screen relative">
    
    <div class="absolute inset-0 bg-grid-pattern bg-grid opacity-20 pointer-events-none z-0"></div>

    <nav class="w-full px-6 py-6 flex items-center justify-between z-50 bg-cyber-black/90 backdrop-blur-md border-b border-white/5 relative">
        <a href="{{ route('home') }}" class="text-cyber-purple text-3xl"><i class="fas fa-shield-halved"></i></a>
        <div class="hidden md:flex items-center gap-12 text-sm font-light tracking-wide text-gray-300">
            <a href="{{ route('home') }}" class="hover:text-cyber-purple transition-colors uppercase">Newest</a>
            <a href="{{ route('analysis') }}" class="hover:text-cyber-purple transition-colors uppercase">Analysis</a>
            <a href="{{ route('cybersecurity') }}" class="hover:text-cyber-purple transition-colors uppercase">Cybersecurity</a>
            <a href="{{ route('opinion') }}" class="text-cyber-purple font-bold uppercase">Opinion</a>
        </div>
        <div class="flex items-center gap-6 text-gray-300 text-lg">
             <form action="{{ route('search') }}" method="GET" class="relative group inline-block mr-2">
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

    <main class="relative z-10 max-w-5xl mx-auto px-6 py-12">
        <div class="space-y-8">
            <div class="group relative bg-[#0a0a0a] border border-white/10 rounded-3xl overflow-hidden hover:border-cyber-purple/50 transition-all duration-300 h-48 flex items-center">
                <div class="flex-1 p-8">
                    <h2 class="text-3xl font-bold mb-3 group-hover:text-cyber-purple transition-colors">Bjorka Kembali?</h2>
                    <p class="text-gray-400 text-sm mb-4 truncate">Bjorkaweidnaionbniobab bnawokbdioabiab io...</p>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">20 Oct 2025 | (User Name)</span>
                </div>
                <div class="w-48 h-full relative">
                    <img src="https://images.unsplash.com/photo-1589254065878-42c9da997008?q=80&w=800" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-l from-transparent to-[#0a0a0a]"></div>
                </div>
            </div>

            <div class="group relative bg-[#0a0a0a] border border-white/10 rounded-3xl overflow-hidden hover:border-cyber-purple/50 transition-all duration-300 h-48 flex items-center">
                <div class="flex-1 p-8">
                    <h2 class="text-3xl font-bold mb-3 group-hover:text-cyber-purple transition-colors">The Future of AI Defense</h2>
                    <p class="text-gray-400 text-sm mb-4 truncate">Why automated defense systems are failing in 2025...</p>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">19 Oct 2025 | Sarah Conner</span>
                </div>
                <div class="w-48 h-full relative">
                    <img src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=800" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-l from-transparent to-[#0a0a0a]"></div>
                </div>
            </div>

            <div class="group relative bg-[#0a0a0a] border border-white/10 rounded-3xl overflow-hidden hover:border-cyber-purple/50 transition-all duration-300 h-48 flex items-center">
                <div class="flex-1 p-8">
                    <h2 class="text-3xl font-bold mb-3 group-hover:text-cyber-purple transition-colors">Digital Forensics 101</h2>
                    <p class="text-gray-400 text-sm mb-4 truncate">Understanding the basics of evidence gathering...</p>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">18 Oct 2025 | Dr. Cyber</span>
                </div>
                <div class="w-48 h-full relative">
                    <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?q=80&w=800" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-l from-transparent to-[#0a0a0a]"></div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>