<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analysis - Deep Dives</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        cyber: { black: '#050505', purple: '#a855f7', purpleGlow: '#d8b4fe' }
                    },
                    boxShadow: { 'neon': '0 0 15px rgba(168, 85, 247, 0.4)' }
                }
            }
        }
    </script>
</head>
<body class="bg-cyber-black text-white font-sans min-h-screen">
    
    <nav class="w-full px-6 py-6 flex items-center justify-between bg-cyber-black/80 backdrop-blur-md sticky top-0 z-50 border-b border-white/5">
        <a href="{{ route('home') }}" class="text-cyber-purple text-3xl"><i class="fas fa-shield-halved"></i></a>
        <div class="hidden md:flex items-center gap-12 text-sm font-light tracking-wide text-gray-300">
            <a href="{{ route('home') }}" class="hover:text-cyber-purple uppercase">Newest</a>
            <a href="{{ route('analysis') }}" class="text-cyber-purple font-bold uppercase">Analysis</a>
            <a href="{{ route('cybersecurity') }}" class="hover:text-cyber-purple uppercase">Cybersecurity</a>
            <a href="{{ route('opinion') }}" class="hover:text-cyber-purple uppercase">Opinion</a>
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
                <a href="{{ route('login') }}"><i class="far fa-user"></i></a>
             @endauth
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-5xl font-bold mb-12">Deep <span class="text-cyber-purple">Analysis</span></h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-20 bg-[#0a0a0a] border border-white/10 rounded-3xl p-8 hover:shadow-neon transition-all duration-500">
            <div class="order-2 md:order-1 flex flex-col justify-center">
                <span class="text-cyber-purple uppercase tracking-widest text-xs font-bold mb-4">Quarterly Report</span>
                <h2 class="text-3xl font-bold mb-4">Ransomware Trends Q4 2025</h2>
                <p class="text-gray-400 mb-6 leading-relaxed">An in-depth look at the shifting tactics of RaaS.</p>
                <div class="flex items-center gap-4">
                    <button class="bg-cyber-purple text-black px-6 py-2 rounded-full font-bold hover:bg-white transition-colors">Read Full Report</button>
                </div>
            </div>
            <div class="order-1 md:order-2 h-64 md:h-auto rounded-2xl overflow-hidden relative">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1000" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-cyber-purple/20 mix-blend-overlay"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-[#0a0a0a] rounded-2xl p-6 border-t-4 border-cyber-purple hover:bg-[#111] transition">
                <div class="flex justify-between items-start mb-4">
                    <i class="fas fa-chart-pie text-2xl text-gray-500"></i>
                    <span class="text-xs text-gray-600">Dec 01, 2025</span>
                </div>
                <h3 class="text-xl font-bold mb-2">Supply Chain Attacks</h3>
                <p class="text-sm text-gray-400 mb-4">Analyzing the ripple effect of the recent NPM package vulnerabilities.</p>
                <a href="#" class="text-cyber-purple text-sm font-bold hover:underline">View Data &rarr;</a>
            </div>
            <div class="bg-[#0a0a0a] rounded-2xl p-6 border-t-4 border-cyber-purple hover:bg-[#111] transition">
                 <div class="flex justify-between items-start mb-4">
                    <i class="fas fa-bug text-2xl text-gray-500"></i>
                    <span class="text-xs text-gray-600">Nov 28, 2025</span>
                </div>
                <h3 class="text-xl font-bold mb-2">Zero-Day Statistics</h3>
                <p class="text-sm text-gray-400 mb-4">Comparing frequency of browser-based zero-days vs kernel exploits.</p>
                <a href="#" class="text-cyber-purple text-sm font-bold hover:underline">View Data &rarr;</a>
            </div>
             <div class="bg-[#0a0a0a] rounded-2xl p-6 border-t-4 border-cyber-purple hover:bg-[#111] transition">
                 <div class="flex justify-between items-start mb-4">
                    <i class="fas fa-network-wired text-2xl text-gray-500"></i>
                    <span class="text-xs text-gray-600">Nov 15, 2025</span>
                </div>
                <h3 class="text-xl font-bold mb-2">Botnet Traffic</h3>
                <p class="text-sm text-gray-400 mb-4">Global traffic analysis of the revived Mirai botnet variant.</p>
                <a href="#" class="text-cyber-purple text-sm font-bold hover:underline">View Data &rarr;</a>
            </div>
        </div>
    </main>
</body>
</html>