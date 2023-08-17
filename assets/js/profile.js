const phoneInput = document.getElementById("phoneInput");
phoneInput.addEventListener("input", function(event) {
    this.value = this.value.replace(/\D/g, "");
});

const previewImage = (input) => {
    const preview = document.getElementById('profile-preview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result; 
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}