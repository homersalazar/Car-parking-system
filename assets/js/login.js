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

