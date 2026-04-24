<?php include "../views/header.php"; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Welcome Back</h3>

                    <form id="loginForm">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <button class="btn btn-primary w-100">Login</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Don't have an account? <a href="register.php">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("loginForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let data = new FormData(this);
        data.append("action", "login");

        fetch("../controllers/AuthController.php", {
            method: "POST",
            body: data
        })
            .then(res => res.json())
            .then(res => {
                if (res.status == "success") window.location = "animals.php";
                else alert(res.message || "Login failed");
            })
            .catch(err => alert("An unexpected error occurred."));
    });
</script>

<?php include "../views/footer.php"; ?>