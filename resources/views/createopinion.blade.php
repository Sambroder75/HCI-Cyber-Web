<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Opini Baru</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        cyber: { black: '#050505', purple: '#a855f7' }
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body class="bg-cyber-black min-h-screen flex items-center justify-center text-white">

    <div class="fixed bottom-0 right-0 w-[450px] h-[450px] bg-cyber-purple/30 rounded-full blur-[120px] -z-10 translate-x-1/4 translate-y-1/4"></div>

    <div class="w-full max-w-2xl p-6 z-10">
        
        <a href="{{ route('opinion') }}" class="inline-flex items-center text-gray-400 hover:text-white mb-6 transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Opini Publik
        </a>

        <div class="glass-card rounded-3xl p-8 shadow-2xl">
            <h2 class="text-3xl font-bold text-center mb-8">Buat Opini Baru</h2>

            <form action="{{ route('opinion.store') }}" method="POST">
                @csrf
                
                @if ($errors->any())
                    <div class="p-3 mb-4 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 text-sm">
                        Terjadi kesalahan. Silakan periksa kembali input Anda.
                    </div>
                @endif

                <div class="mb-6">
                    <label for="opinion_title" class="block text-sm font-medium text-gray-300 mb-2">
                        Judul Opini (Maks. 150 Karakter)
                    </label>
                    <input type="text" name="title" id="opinion_title" 
                           placeholder="Masukkan judul yang menarik..."
                           value="{{ old('title') }}"
                           class="w-full input-field border rounded-xl p-3 focus:outline-none focus:border-cyber-purple transition placeholder-gray-500">
                    @error('title')
                        <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="opinion_text" class="block text-sm font-medium text-gray-300 mb-2">
                        Isi Opini Anda (Maks. 1000 Karakter)
                    </label>
                    <textarea name="text" id="opinion_text" rows="10" 
                              placeholder="Ketik detail opini Anda di sini..."
                              class="w-full input-field border rounded-xl p-4 focus:outline-none focus:border-cyber-purple transition resize-none placeholder-gray-500"
                              maxlength="1000">{{ old('text') }}</textarea>
                    @error('text')
                        <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium text-gray-300 mb-2">Kategori</label>
                        <select name="category" id="category" class="w-full input-field bg-[#1a1a1a] text-white border border-gray-600 rounded-xl p-3 focus:outline-none focus:border-cyber-purple transition">
                            <option value="General">General</option>
                            <option value="Cybersecurity">Cybersecurity</option>
                            <option value="Network">Network</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Programming">Programming</option>
                        </select>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('opinion') }}" class="px-6 py-3 rounded-xl border border-gray-600 text-gray-400 hover:bg-gray-800 transition">Batal</a>
                    <button type="submit" class="px-6 py-3 rounded-xl bg-cyber-purple text-white font-semibold shadow-neon hover:bg-purple-600 transition-colors">
                        Posting Opini
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>