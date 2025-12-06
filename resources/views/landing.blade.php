<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CyberSec News</title>
    
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
                        'neon': '0 0 20px rgba(168, 85, 247, 0.4)',
                        'neon-hover': '0 0 30px rgba(168, 85, 247, 0.6)',
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
        .text-glow { text-shadow: 0 0 10px rgba(168, 85, 247, 0.5); }
    </style>
</head>
<body class="bg-cyber-black text-white font-sans min-h-screen flex flex-col relative overflow-x-hidden selection:bg-cyber-purple selection:text-black">

    <div class="fixed inset-0 bg-grid-pattern bg-grid opacity-[0.15] pointer-events-none"></div>
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-cyber-purple/20 rounded-full blur-[150px] -z-10 pointer-events-none"></div>

    <nav class="w-full px-6 py-6 flex items-center justify-between z-50 fixed top-0 bg-cyber-black/80 backdrop-blur-md border-b border-white/5">
        <div class="flex items-center gap-3">
            <i class="fas fa-shield-halved text-cyber-purple text-3xl animate-pulse"></i>
            <span class="font-bold text-xl tracking-wider">CYBER<span class="text-cyber-purple">SEC</span></span>
        </div>
        
        <div class="flex items-center gap-6">
            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition font-medium">Log In</a>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-white text-black font-bold rounded-full hover:bg-cyber-purple hover:text-white transition-all shadow-lg hover:shadow-neon">
                Get Started
            </a>
        </div>
    </nav>

    <header class="flex-grow flex flex-col items-center justify-center text-center px-6 pt-32 pb-20 relative z-10">
        <div class="inline-block px-4 py-1 mb-6 rounded-full border border-cyber-purple/30 bg-cyber-purple/10 text-cyber-purpleLight text-xs font-semibold tracking-widest uppercase animate-bounce">
            The #1 Source for InfoSec
        </div>
        
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight max-w-4xl">
            Secure Your <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-cyber-purple to-indigo-500 text-glow">Digital Future</span>
        </h1>
        
        <p class="text-gray-400 text-lg md:text-xl max-w-2xl mb-10 leading-relaxed">
            Stay ahead of threats with real-time cybersecurity news, deep-dive analysis, and expert community opinions. Join the elite network of security professionals.
        </p>
        
        <div class="flex flex-col md:flex-row gap-4 w-full justify-center">
            <a href="{{ route('register') }}" class="px-8 py-4 bg-cyber-purple text-white font-bold rounded-xl text-lg hover:bg-purple-600 transition-all shadow-neon hover:scale-105 transform">
                Join the Community <i class="fas fa-arrow-right ml-2"></i>
            </a>
            <a href="{{ route('home') }}" class="px-8 py-4 border border-gray-600 text-gray-300 font-bold rounded-xl text-lg hover:bg-white/5 hover:border-white transition-all">
                Explore as Guest
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20 border-t border-white/10 pt-10 w-full max-w-4xl">
            <div>
                <h3 class="text-3xl font-bold text-white mb-1">10k+</h3>
                <p class="text-gray-500 text-sm uppercase tracking-wide">Members</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-white mb-1">500+</h3>
                <p class="text-gray-500 text-sm uppercase tracking-wide">Articles</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-white mb-1">24/7</h3>
                <p class="text-gray-500 text-sm uppercase tracking-wide">Monitoring</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-white mb-1">100%</h3>
                <p class="text-gray-500 text-sm uppercase tracking-wide">Secure</p>
            </div>
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-6 py-20 w-full">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group p-8 rounded-3xl bg-[#0a0a0a] border border-white/5 hover:border-cyber-purple/50 transition-all hover:-translate-y-2 duration-300">
                <div class="w-14 h-14 bg-gray-900 rounded-2xl flex items-center justify-center text-cyber-purple text-2xl mb-6 group-hover:bg-cyber-purple group-hover:text-white transition-colors shadow-lg">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Latest News</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Get breaking news on data breaches, vulnerabilities, and patches directly from trusted sources globally.
                </p>
            </div>

            <div class="group p-8 rounded-3xl bg-[#0a0a0a] border border-white/5 hover:border-cyber-purple/50 transition-all hover:-translate-y-2 duration-300">
                <div class="w-14 h-14 bg-gray-900 rounded-2xl flex items-center justify-center text-cyber-purple text-2xl mb-6 group-hover:bg-cyber-purple group-hover:text-white transition-colors shadow-lg">
                    <i class="fas fa-magnifying-glass-chart"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Deep Analysis</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Understand the "how" and "why" behind attacks with our comprehensive technical breakdowns and reports.
                </p>
            </div>

            <div class="group p-8 rounded-3xl bg-[#0a0a0a] border border-white/5 hover:border-cyber-purple/50 transition-all hover:-translate-y-2 duration-300">
                <div class="w-14 h-14 bg-gray-900 rounded-2xl flex items-center justify-center text-cyber-purple text-2xl mb-6 group-hover:bg-cyber-purple group-hover:text-white transition-colors shadow-lg">
                    <i class="fas fa-comments"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Expert Opinion</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Join the debate. Vote on controversial topics and share your perspective with peers in the industry.
                </p>
            </div>
        </div>
    </section>

    <footer class="bg-black border-t border-white/10 py-8 text-center text-gray-600 text-sm">
        &copy; 2025 CyberSec News. All rights reserved.
    </footer>

</body>
</html>