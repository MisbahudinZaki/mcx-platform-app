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
        togglePassword.classList.toggle('bi-eye-fill');
        togglePassword.classList.toggle('bi-eye-slash');
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

document.getElementById("btn-toggle-sidebar").addEventListener("click", function() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("collapsed");
});

document.addEventListener("DOMContentLoaded", () => {
    const overlay = document.querySelector(".side-panel-overlay");
    const panel = document.querySelector(".side-panel");

    window.addEventListener("open-panel", () => {
        overlay.classList.add("active");
        panel.classList.add("active");
    });

    window.addEventListener("close-panel", () => {
        overlay.classList.remove("active");
        panel.classList.remove("active");
        resetSteps();
    });

    overlay?.addEventListener("click", () => {
        window.dispatchEvent(new Event("close-panel"));
    });
});

function goToStep2() {
    // Validasi form dulu
    const form = document.getElementById("formRequest");
    
    if (!form.counterparty_name.value) {
        alert("Counterparty Name is required");
        return;
    }
    if (!form.financing_amount.value) {
        alert("Financing Amount is required");
        return;
    }
    if (!form.approval_note.files.length) {
        alert("Approval Note PDF is required");
        return;
    }
    if (!form.request_letter.files.length) {
        alert("Request Letter PDF is required");
        return;
    }

    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';

    document.getElementById('ov_counterparty').textContent = form.counterparty_name.value;
    document.getElementById('ov_currency').textContent = form.currency.value;
    document.getElementById('ov_amount').textContent = form.financing_amount.value;
    document.getElementById('ov_rate').textContent = form.rate_type.value;
    document.getElementById('ov_open').textContent = form.open_date.value;
    document.getElementById('ov_maturity').textContent = form.maturity_date.value;
    document.getElementById('ov_approval').textContent = form.approval_note.files[0]?.name || 'No file';
    document.getElementById('ov_request').textContent = form.request_letter.files[0]?.name || 'No file';
}

function goToStep1() {
    document.getElementById('step2').style.display = 'none';
    document.getElementById('step1').style.display = 'block';
}

function resetSteps() {
    document.getElementById('step1').style.display = 'block';
    document.getElementById('step2').style.display = 'none';
    document.getElementById('formRequest').reset();
}