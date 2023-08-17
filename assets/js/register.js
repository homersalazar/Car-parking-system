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

// $(document).ready(function() {
//     $("#myForm").submit(function(event) {
//         event.preventDefault(); 
//         $.notify("Register successfully!", {
//             position: "top right",
//             className: "success"
//         });
//     });
// });

// $(document).ready(function() {
//     $('#myForm').submit(function(e) {
//         e.preventDefault();
//         $.ajax({
//             type: "POST",
//             url: "../entities/action.php", // Replace with the actual URL
//             data: $(this).serialize(),
//             dataType: "json",
//             success: function(response) {
//                 if (response.status === "success") {
//                     // Redirect to the profile page
//                     window.location.href = "../profile.php?id=" + response.id;
//                 } else {
//                     // Display the notification
//                     $.notify(response.message, { position: "top right", className: "error" });
//                 }
//             }
//         });
//     });
// });
