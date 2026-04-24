function adopt(id, btn) {
    const originalText = btn.innerText;
    btn.innerText = "Processing...";
    btn.disabled = true;

    let data = new FormData();
    data.append("action", "adopt");
    data.append("animal_id", id);

    fetch("../controllers/AnimalController.php", {
        method: "POST",
        body: data
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {
            btn.innerText = "Adopted ✅";
            btn.classList.replace("btn-adopt", "btn-secondary");
            btn.classList.replace("btn-success", "btn-secondary"); // Just in case it was success
        } else if (res.status === "not_logged_in") {
            alert("Please login first to adopt a pet! 🐾");
            window.location = "login.php";
        } else {
            alert("Error: " + (res.message || res));
            btn.innerText = originalText;
            btn.disabled = false;
        }
    })
    .catch(err => {
        console.error("Adoption error:", err);
        alert("Something went wrong. Please try again.");
        btn.innerText = originalText;
        btn.disabled = false;
    });
}