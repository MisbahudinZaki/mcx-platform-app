document.addEventListener("DOMContentLoaded", function () {
    const loginFailedModal = document.getElementById("loginFailedModal");

    if (loginFailedModal) {
        // modal visible
        loginFailedModal.classList.add("show");
    }
});

function closeModal(id) {
    const modal = document.getElementById(id);

    if (!modal) return;

    modal.classList.remove("show");

    // kasih delay agar animasinya sempat jalan
    setTimeout(() => {
        modal.style.visibility = "hidden";
    }, 300);
}

document.addEventListener('DOMContentLoaded', function() {
    // === Password Toggle ===
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', () => {
        const isPassword = passwordInput.getAttribute('type') === 'password';
        passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
        togglePassword.classList.toggle('fa-eye');
        togglePassword.classList.toggle('fa-eye-slash');
    });

    // === Enable/Disable Login Button ===
    const usernameInput = document.getElementById('username');
    const loginBtn = document.getElementById('loginBtn');

    function toggleButtonState() {
        if (usernameInput.value.trim() !== '' && passwordInput.value.trim() !== '') {
            loginBtn.disabled = false;
        } else {
            loginBtn.disabled = true;
        }
    }

    usernameInput.addEventListener('input', toggleButtonState);
    passwordInput.addEventListener('input', toggleButtonState);
});

// document.getElementById("btn-toggle-sidebar").addEventListener("click", function() {
//     const sidebar = document.getElementById("sidebar");
//     sidebar.classList.toggle("collapsed");
// });