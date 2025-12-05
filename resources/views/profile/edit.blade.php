<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    
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

    <div class="w-full max-w-lg p-6">
        
        <div class="glass-card rounded-3xl p-8 shadow-2xl">
            <h2 class="text-2xl font-bold text-center mb-6">Edit Profile</h2>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-6 text-center">
                    <label class="cursor-pointer block">
                        <div class="w-24 h-24 mx-auto bg-gray-800 rounded-full flex items-center justify-center overflow-hidden border-2 border-dashed border-cyber-purple hover:bg-gray-700 transition relative group">
                            @if($user->avatar)
                                <img id="avatar-preview" src="{{ asset('storage/' . $user->avatar) }}" class="w-full h-full object-cover">
                            @else
                                <img id="avatar-preview" class="w-full h-full object-cover hidden" src="#">
                                <i id="avatar-icon" class="fas fa-camera text-2xl text-gray-400"></i>
                            @endif
                            <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                <span class="text-xs">Change</span>
                            </div>
                        </div>
                        <input type="file" name="avatar" id="avatar-input" class="hidden">
                    </label>
                    @error('avatar') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm text-gray-400 mb-1">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full input-field border rounded-lg p-3 focus:outline-none focus:border-cyber-purple">
                    @error('name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm text-gray-500 mb-1">Email Address <span class="text-xs italic">(Cannot be changed)</span></label>
                    <input type="email" 
                           value="{{ $user->email }}" 
                           class="w-full input-field input-disabled border rounded-lg p-3 focus:outline-none" 
                           readonly>
                </div>

                <div class="flex gap-4">
                    <a href="{{ route('profile') }}" class="w-1/2 py-3 rounded-lg border border-gray-600 text-center hover:bg-gray-800 transition">Cancel</a>
                    <button type="submit" class="w-1/2 py-3 rounded-lg bg-cyber-purple text-white hover:bg-purple-600 transition">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/profile.js') }}"></script>

</body>
</html>