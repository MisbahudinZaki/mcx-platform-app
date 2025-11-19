document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('loginFailedModal');
    const closeBtn = document.getElementById('closeLoginFailedModalBtn');

    if (modal && closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.style.opacity = '0';
            modal.style.visibility = 'hidden';
            setTimeout(() => modal.remove(), 300);
        });
    }
});

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

function refreshTime() {
    const timeEl = document.getElementById('latest-update');
    const now = new Date();
    const formatted = now.toLocaleString('en-GB', { 
        weekday: 'long', day: '2-digit', month: 'short', 
        year: 'numeric', hour: '2-digit', minute: '2-digit',
        timeZone: 'Asia/Jakarta'
    });
    timeEl.textContent = `${formatted} (GMT +7)`;
}

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');

    // Buat overlay untuk background gelap
    const overlay = document.createElement('div');
    overlay.classList.add('sidebar-overlay');
    document.body.appendChild(overlay);

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');

        const icon = toggleBtn.querySelector('i');
        if (sidebar.classList.contains('active')) {
            icon.classList.replace('bi-box-arrow-in-right', 'bi-box-arrow-in-left');
        } else {
            icon.classList.replace('bi-box-arrow-in-left', 'bi-box-arrow-in-right');
        }
    });

    // Klik overlay untuk tutup sidebar
    overlay.addEventListener('click', () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        const icon = toggleBtn.querySelector('i');
        icon.classList.replace('bi-box-arrow-in-left', 'bi-box-arrow-in-right');
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const fp = flatpickr("#filterDate", {
        mode: "range",
        dateFormat: "Y-m-d",
        showMonths: 2,
        inline: false,
        onReady: function(selectedDates, dateStr, instance) {
            // Tambah class khusus untuk style custom
            instance.calendarContainer.classList.add("hasPreset");

            // Buat elemen preset di kiri
            const presetContainer = document.createElement("div");
            presetContainer.className = "flatpickr-preset";
            presetContainer.innerHTML = `
                <ul class="preset-list">
                    <li data-range="today" class="active">Today</li>
                    <li data-range="lastWeek">Last Week</li>
                    <li data-range="lastMonth">Last Month</li>
                    <li data-range="last3Months">Last 3 Months</li>
                    <li data-range="custom">Custom</li>
                </ul>
            `;

            // Masukkan ke dalam kalender
            instance.calendarContainer.prepend(presetContainer);

            // Event klik preset
            presetContainer.querySelectorAll("li").forEach(item => {
                item.addEventListener("click", () => {
                    presetContainer.querySelectorAll("li").forEach(li => li.classList.remove("active"));
                    item.classList.add("active");

                    const today = new Date();
                    let start, end;

                    switch (item.dataset.range) {
                        case "today":
                            start = end = today;
                            break;
                        case "lastWeek":
                            end = new Date(today);
                            start = new Date(today);
                            start.setDate(today.getDate() - 7);
                            break;
                        case "lastMonth":
                            start = new Date(today.getFullYear(), today.getMonth() - 1, 1);
                            end = new Date(today.getFullYear(), today.getMonth(), 0);
                            break;
                        case "last3Months":
                            start = new Date(today.getFullYear(), today.getMonth() - 3, 1);
                            end = new Date(today.getFullYear(), today.getMonth(), 0);
                            break;
                        case "custom":
                            instance.clear(); // user pilih manual
                            return;
                    }
                    instance.setDate([start, end], true);
                });
            });
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {

    flatpickr("#todoCalendar", {
        inline: true,
        defaultDate: "2025-11-11",
        disableMobile: true,
        showMonths: 1,
        onDayCreate: function(dObj, dStr, fp, dayElem) {
            const date = dayElem.dateObj;

            // Dummy events
            const blueEvents = ["2025-11-29"];
            const redEvents  = ["2025-11-30"];

            const iso = date.toISOString().split("T")[0];

            if (blueEvents.includes(iso)) {
                const dot = document.createElement("span");
                dot.classList.add("event-dot", "blue");
                dayElem.appendChild(dot);
            }

            if (redEvents.includes(iso)) {
                const dot = document.createElement("span");
                dot.classList.add("event-dot", "red");
                dayElem.appendChild(dot);
            }
        }
    });

});