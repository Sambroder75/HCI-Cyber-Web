<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybersecurity Topics</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] }, // Changed to Inter to match home/analysis
                    colors: {
                        cyber: { black: '#050505', purple: '#a855f7', purpleGlow: '#d8b4fe' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-cyber-black text-white font-sans min-h-screen flex flex-col relative overflow-x-hidden">

    <div class="fixed bottom-0 right-0 w-[450px] h-[450px] bg-cyber-purple/30 rounded-full blur-[120px] pointer-events-none -z-10 translate-x-1/4 translate-y-1/4"></div>

    <nav class="w-full px-6 py-6 flex items-center justify-between z-50 bg-cyber-black/50 backdrop-blur-md sticky top-0 border-b border-white/5">
        <a href="{{ route('home') }}" class="flex items-center gap-2 group">
            <div class="text-cyber-purple text-3xl group-hover:text-cyber-purpleGlow transition-colors duration-300">
                <i class="fas fa-shield-halved"></i>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-12 text-sm font-light tracking-wide text-gray-300">
            <a href="{{ route('home') }}" class="hover:text-cyber-purple transition-colors uppercase">Newest</a>
            <a href="{{ route('analysis') }}" class="hover:text-cyber-purple transition-colors uppercase">Analysis</a>
            <a href="{{ route('cybersecurity') }}" class="text-cyber-purple font-bold uppercase">Cybersecurity</a>
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
        </div>
    </nav>

    <main class="flex-grow max-w-7xl mx-auto px-8 py-12 w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-20">
            <div class="flex flex-col items-start">
                <h2 class="text-4xl font-medium mb-4"><span class="text-[#d946ef]">Reentrancy</span> <span class="text-white">Attack</span></h2>
                <p class="text-gray-400 font-light text-lg mb-8">Learn Reentrancy attack here</p>
                <a href="{{ route('cybersecurity.reentry') }}" class="px-8 py-2 rounded-full border border-pink-500/50 text-gray-300 text-sm hover:bg-pink-500 hover:text-white transition-all">Read More....</a>
            </div>
            <div class="flex flex-col items-start">
                <h2 class="text-4xl font-medium text-[#d946ef] mb-4">IDOR</h2>
                <p class="text-gray-400 font-light text-lg mb-8">Learn about IDOR in here</p>
                <a href="{{ route('cybersecurity.idor') }}" class="inline-block px-8 py-2 rounded-full border border-pink-500/50 text-gray-300 text-sm hover:bg-pink-500 hover:text-white transition-all">
                     Read More....
                </a>
            </div>
            <div class="flex flex-col items-start">
                <h2 class="text-4xl font-medium mb-4"><span class="text-[#d946ef]">Binary</span> <span class="text-white">Exploitation</span></h2>
                <p class="text-gray-400 font-light text-lg mb-8">Learn Binary exploitation in here</p>
                <a href="{{ route('cybersecurity.binex') }}" class="px-8 py-2 rounded-full border border-pink-500/50 text-gray-300 text-sm hover:bg-pink-500 hover:text-white transition-all">Read More....</a>
            </div>
            <div class="flex flex-col items-start">
                <h2 class="text-4xl font-medium mb-4"><span class="text-[#d946ef]">SQL</span> <span class="text-white">Injection</span></h2>
                <p class="text-gray-400 font-light text-lg mb-8">Learn SQL Injection in here</p>
                <a href="{{ route('cybersecurity.sql') }}" class="px-8 py-2 rounded-full border border-pink-500/50 text-gray-300 text-sm hover:bg-pink-500 hover:text-white transition-all">Read More....</a>
            </div>
            <div class="flex flex-col items-start">
                <h2 class="text-4xl font-medium mb-4"><span class="text-[#d946ef]">Cross-site</span> <br><span class="text-white">Scripting</span></h2>
                <p class="text-gray-400 font-light text-lg mb-8">Learn XSS in here</p>
                <a href="{{ route('cybersecurity.xss') }}" class="px-8 py-2 rounded-full border border-pink-500/50 text-gray-300 text-sm hover:bg-pink-500 hover:text-white transition-all">Read More....</a>
            </div>
            <div class="flex flex-col items-start">
                <h2 class="text-4xl font-medium mb-4"><span class="text-[#d946ef]">Broken</span> <br><span class="text-white">Access Control</span></h2>
                <p class="text-gray-400 font-light text-lg mb-8">Learn Broken access control here</p>
                <a href="{{ route('cybersecurity.brokenaccess') }}" class="px-8 py-2 rounded-full border border-pink-500/50 text-gray-300 text-sm hover:bg-pink-500 hover:text-white transition-all">Read More....</a>
            </div>
        </div>
    </main>
</body>
</html>