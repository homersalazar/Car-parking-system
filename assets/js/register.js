document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("password");
    const showHideButton = document.getElementById("check");
    const eyeIcon = document.getElementById("eyeIcon");
    const eyeSlashIcon = document.getElementById("eyeSlashIcon");
    showHideButton.addEventListener("click", function () {
        if (passwordInput.type === "text") {
            passwordInput.type = "password";
            eyeSlashIcon.classList.remove("hidden");
            eyeIcon.classList.add("hidden");
        } else {
            passwordInput.type = "text";
            eyeSlashIcon.classList.add("hidden");
            eyeIcon.classList.remove("hidden");
        }
    });
});

// $(document).ready(function() {
//     $('#register_form').submit(function(e) {
//         e.preventDefault();
//         $.ajax({
//             type: "POST",
//             url: "./entities/action.php", // Replace with the actual URL
//             data: $(this).serialize(),
//             dataType: "json",
//             success: function(response) {
//                 if (response.status === "success") {
//                     $.notify(response.message, { position: "top right", className: "error" });
//                     window.location.href = "profile.php?id=" + response.id;
//                 } else {
//                     // Display the notification
//                     $.notify(response.message, { position: "top right", className: "error" });
//                 }
//             }
//         });
//     });
// });
