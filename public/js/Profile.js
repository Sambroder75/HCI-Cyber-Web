document.addEventListener('DOMContentLoaded', function() {
            const avatarInput = document.getElementById('avatar-input');
            const preview = document.getElementById('avatar-preview');
            const icon = document.getElementById('avatar-icon');

            if (avatarInput) {
                avatarInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            // Update the image source
                            preview.src = e.target.result;
                            
                            // Show image, hide icon
                            preview.classList.remove('hidden');
                            if (icon) icon.classList.add('hidden');
                        }
                        
                        reader.readAsDataURL(file);
                    }
                });
            }
        });