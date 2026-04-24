<?php include "../views/header.php"; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Create Account</h3>

                    <form id="registerForm">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Your name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Your email address" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Create a password" required>
                        </div>
                        <button class="btn btn-primary w-100">Register</button>
                    </form>

                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="login.php">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("registerForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let data = new FormData(this);
        data.append("action", "register");

        fetch("../controllers/AuthController.php", {
            method: "POST",
            body: data
        })
            .then(res => res.json())
            .then(res => {
                if (res.status == "success") {
                    window.location = "login.php";
                } else {
                    alert(res.message || "Registration failed");
                }
            })
            .catch(err => alert("An unexpected error occurred."));
    });
</script>

<?php include "../views/footer.php"; ?>