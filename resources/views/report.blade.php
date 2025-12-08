<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report - Ransomware Trends Q4</title>
    
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
                                blockquote: { color: theme('colors.gray.400') },
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
            <a href="{{ route('analysis') }}" class="text-cyber-purple font-bold uppercase">Analysis</a>
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
                <a href="{{ route('analysis') }}" class="text-gray-500 hover:text-white uppercase tracking-widest hover:underline">Analysis</a>
                <span class="text-cyber-purple">/</span>
                <span class="text-cyber-purple font-bold uppercase tracking-widest">Quarterly Report</span>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Ransomware Trends Q4 2025: The Shift to Double Extortion</h1>
            
            <div class="flex items-center gap-4 mb-8 text-gray-400 text-sm border-b border-white/10 pb-8">
                <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-cyber-purple to-blue-600 p-[2px]">
                    <div class="w-full h-full rounded-full bg-black overflow-hidden flex items-center justify-center">
                        <i class="fas fa-shield-cat text-xl text-cyber-purple"></i>
                    </div>
                </div>
                <div>
                    <span class="block text-white font-semibold text-base">CyberSec Research Team</span>
                    <span class="text-xs uppercase tracking-wide">Dec 01, 2025 • 15 min read</span>
                </div>
                <div class="ml-auto flex gap-3">
                    <button class="text-gray-400 hover:text-cyber-purple transition" title="Print Report"><i class="fas fa-print"></i></button>
                    <button class="text-gray-400 hover:text-cyber-purple transition" title="Share"><i class="fas fa-share-nodes"></i></button>
                </div>
            </div>

            <div class="w-full h-[400px] rounded-2xl overflow-hidden mb-10 border border-cyber-purple/30 shadow-neon">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070" class="w-full h-full object-cover">
            </div>

            <article class="prose prose-invert prose-lg max-w-none text-gray-300 leading-relaxed">
                <p class="mb-6 first-letter:text-5xl first-letter:font-bold first-letter:text-cyber-purple first-letter:float-left first-letter:mr-3">
                    The landscape of ransomware has evolved significantly in the final quarter of 2025. Gone are the days of simple encryption attacks. Today, we are witnessing a standardized "Double Extortion" model where threat actors not only lock data but threaten to leak sensitive IP if the ransom is not paid.
                </p>
                
                <h3 class="text-2xl text-white font-bold mb-4 mt-8">Key Findings</h3>
                <ul class="list-disc pl-5 mb-6 space-y-2 marker:text-cyber-purple">
                    <li><strong>RaaS Proliferation:</strong> Ransomware-as-a-Service platforms have lowered the barrier to entry, increasing attack volume by 40%.</li>
                    <li><strong>Healthcare Targeting:</strong> 30% of all Q4 attacks were directed at healthcare infrastructure, exploiting legacy systems.</li>
                    <li><strong>Supply Chain Vectors:</strong> Attackers are increasingly pivoting through third-party vendors to reach high-value targets.</li>
                </ul>

                <blockquote class="border-l-4 border-cyber-purple pl-6 italic text-xl text-gray-400 my-8 bg-[#111] py-4 rounded-r-lg">
                    "Data exfiltration is no longer a secondary tactic; it is the primary leverage."
                </blockquote>

                <h3 class="text-2xl text-white font-bold mb-4 mt-8">Mitigation Strategies</h3>
                <p class="mb-6">
                    Organizations must move beyond perimeter defense. Immutable backups, network segmentation, and continuous monitoring for lateral movement are the only effective defenses against modern RaaS groups.
                </p>
            </article>

            <div class="mt-12 pt-8 border-t border-white/10">
                <a href="{{ route('analysis') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white transition-colors">
                    <i class="fas fa-arrow-left"></i> Back to Analysis
                </a>
            </div>

        </div>

        <aside class="space-y-10">
            <div class="bg-gradient-to-br from-cyber-purple/20 to-blue-900/20 p-6 rounded-2xl border border-cyber-purple/30 text-center">
                <i class="fas fa-file-pdf text-4xl text-cyber-purple mb-4"></i>
                <h3 class="font-bold text-white mb-2">Download PDF</h3>
                <p class="text-xs text-gray-400 mb-6">Get the full 45-page technical breakdown for offline reading.</p>
                <button class="w-full py-2 rounded-full bg-cyber-purple text-black font-bold hover:bg-white transition-colors">Download Now</button>
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