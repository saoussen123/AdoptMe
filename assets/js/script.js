function submitAdoptionForm() {
    const form = document.getElementById("adoptionForm");
    const btn = document.getElementById("submitAdoptBtn");

    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }

    btn.innerText = "Submitting...";
    btn.disabled = true;

    const data = new FormData(form);
    data.append("action", "submit_form");

    fetch("../controllers/AnimalController.php", {
        method: "POST",
        body: data
    })
        .then(res => res.json())
        .then(res => {
            if (res.status === "success") {
                // ✅ Redirect to profile.php
                window.location.href = "profile.php";

            } else if (res.status === "not_logged_in") {
                alert("Session expired. Please login again.");
                window.location = "login.php";

            } else {
                alert("Error: " + (res.message || "Unknown error"));
                btn.innerText = "Submit Application";
                btn.disabled = false;
            }
        })
        .catch(err => {
            console.error("Submit error:", err);
            alert("Something went wrong. Please try again.");
            btn.innerText = "Submit Application";
            btn.disabled = false;
        });
}

// ─────────────────────────────────────────
// HELPER: Success alert
// ─────────────────────────────────────────
function showSuccessAlert(message) {
    const alertEl = document.createElement("div");
    alertEl.className = "alert alert-success alert-dismissible fade show position-fixed";
    alertEl.style.cssText = "top: 20px; right: 20px; z-index: 9999; min-width: 300px; box-shadow: 0 4px 20px rgba(0,0,0,0.15);";
    alertEl.innerHTML = `
        <i class="fas fa-check-circle me-2"></i>${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    document.body.appendChild(alertEl);
    setTimeout(() => alertEl.remove(), 5000);
}

// ─────────────────────────────────────────
// HELPER: Toggle conditional fields
// ─────────────────────────────────────────
function toggleField(selectId, fieldId, showValue) {
    const select = document.getElementById(selectId);
    const field = document.getElementById(fieldId);
    if (!select || !field) return;

    select.addEventListener("change", () => {
        field.style.display = select.value === showValue ? "block" : "none";
        const input = field.querySelector("input, textarea, select");
        if (input) input.required = select.value === showValue;
    });
}

// ─────────────────────────────────────────
// INIT
// ─────────────────────────────────────────
document.addEventListener("DOMContentLoaded", () => {
    toggleField("modal_has_children", "children_ages_field", "1");
    toggleField("modal_has_current_pets", "current_pets_field", "1");
});