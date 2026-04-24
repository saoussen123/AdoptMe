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
    .then(res => res.text())
    .then(res => {
        if (res === "success") {
            btn.innerText = "Adopted ✅";
            btn.classList.replace("btn-success", "btn-secondary");
        } else if (res === "not_logged_in") {
            alert("Please login first to adopt a pet! 🐾");
            window.location = "login.php";
        } else {
            alert("Error: " + res);
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