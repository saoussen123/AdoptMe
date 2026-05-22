<?php include "../views/header.php"; ?>

<section class="min-vh-100 d-flex align-items-center" style="background: #f0f2f5; padding: 2rem 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10">
                <div class="card border-0 overflow-hidden reveal reveal-1"
                    style="border-radius: var(--radius); box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
                    <div class="row g-0">

                        <!-- Left panel -->
                        <div class="col-md-5 d-none d-md-flex flex-column align-items-center justify-content-center p-5 text-white"
                            style="background: #847cec; border-radius: var(--radius) 0 0 var(--radius); min-height: 560px;">
                            <div style="position: relative; z-index: 1; text-align: center;">
                                <div style="margin-bottom: 2rem;">
                                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#FF8A00"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        style="fill: #FF8A00; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));">
                                        <path d="M12 18s-2.5-1-4-5-1-6-1-7 2-3 4-3 4 2 4 3 .5 3-1 7-4 5-4 5z" />
                                        <circle cx="7.5" cy="8.5" r="2" fill="#FF8A00" stroke="#000" stroke-width="2" />
                                        <circle cx="11.5" cy="5.5" r="2" fill="#FF8A00" stroke="#000"
                                            stroke-width="2" />
                                        <circle cx="16.5" cy="8.5" r="2" fill="#FF8A00" stroke="#000"
                                            stroke-width="2" />
                                        <path d="M12 18s-2.5-1-4-5-1-6-1-7 2-3 4-3 4 2 4 3 .5 3-1 7-4 5-4 5z"
                                            fill="#FF8A00" stroke="#000" stroke-width="2" />
                                    </svg>
                                </div>
                                <h3
                                    style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #fff; letter-spacing: -0.01em; margin-bottom: 1rem;">
                                    Find your forever friend</h3>
                                <p
                                    style="color: rgba(255,255,255,0.85); font-size: 15px; line-height: 1.6; margin-bottom: 4rem;">
                                    Thousands of pets are waiting for a loving home. Join AdoptMe and make a difference.
                                </p>
                                <div class="d-flex gap-3 flex-wrap justify-content-center">
                                    <span class="badge rounded-pill px-4 py-2"
                                        style="background: rgba(0,0,0,0.15); color: #fff; font-size: 13px; font-weight: 500;">🐶 Dogs</span>
                                    <span class="badge rounded-pill px-4 py-2"
                                        style="background: rgba(0,0,0,0.15); color: #fff; font-size: 13px; font-weight: 500;">🐱 Cats</span>
                                    <span class="badge rounded-pill px-4 py-2"
                                        style="background: rgba(0,0,0,0.15); color: #fff; font-size: 13px; font-weight: 500;">🐰 More</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right panel: form -->
                        <div class="col-md-7 p-4 p-md-5"
                            style="background: #383b42; color: white; border-radius: 0 var(--radius) var(--radius) 0;">

                            <h3
                                style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #fff; margin-bottom: 0.25rem;">
                                Welcome back</h3>
                            <p style="color: #b0b4ba; font-size: 15px; margin-bottom: 2rem;">Sign in to continue to AdoptMe</p>

                            <!-- Error alert -->
                            <div id="loginError" class="alert d-none py-2 mb-3" role="alert"
                                style="font-size: 14px; border-radius: 8px; background: rgba(220, 53, 69, 0.1); color: #ff8a8a; border: 1px solid rgba(220, 53, 69, 0.2);">
                            </div>

                            <form id="loginForm" novalidate>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label mb-1"
                                        style="font-size: 13px; color: #b0b4ba;">Email</label>
                                    <input name="email" type="email" class="form-control" placeholder="you@example.com"
                                        required
                                        style="border-radius: 8px; font-size: 14px; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.1); background: #2f3238; color: white;">
                                </div>

                                <!-- Password -->
                                <div class="mb-2">
                                    <label class="form-label mb-1"
                                        style="font-size: 13px; color: #b0b4ba;">Password</label>
                                    <div class="input-group">
                                        <input name="password" type="password" id="passwordInput"
                                            class="form-control border-end-0" placeholder="Enter password" required
                                            style="border-radius: 8px 0 0 8px; font-size: 14px; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.1); background: #2f3238; color: white;">
                                        <button type="button" id="togglePassword" class="btn border-start-0"
                                            style="border-radius: 0 8px 8px 0; border: 1px solid rgba(255,255,255,0.1); border-left: none; background: #2f3238; color: #888; padding: 0 14px;"
                                            tabindex="-1">
                                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember"
                                            style="accent-color: #847cec; border-color: rgba(255,255,255,0.2); background-color: #2f3238;">
                                        <label class="form-check-label" for="rememberMe"
                                            style="font-size: 14px; color: #cccccc;">Remember me</label>
                                    </div>
                                    <a href="forgot_password.php"
                                        style="font-size: 13px; color: #a49ef2; text-decoration: none;">Forgot
                                        password?</a>
                                </div>

                                <!-- Submit -->
                                <button type="submit" id="loginBtn"
                                    class="btn w-100 d-flex align-items-center justify-content-center gap-2"
                                    style="background: #847cec; color: white; border-radius: 8px; font-size: 16px; font-weight: 500; padding: 12px; border: none; box-shadow: 0 4px 12px rgba(132,124,236,0.3);">
                                    <span id="btnText">Login</span>
                                    <span id="btnSpinner" class="spinner-border spinner-border-sm d-none"
                                        role="status"></span>
                                </button>

                            </form>

                            <p class="text-center mt-4 mb-0" style="font-size: 14px; color: #b0b4ba;">
                                Don't have an account?
                                <a href="register.php" style="color: #a49ef2; text-decoration: none;">Register here</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Show/hide password
    document.getElementById("togglePassword").addEventListener("click", function () {
        const input = document.getElementById("passwordInput");
        const isPassword = input.type === "password";
        input.type = isPassword ? "text" : "password";
        document.getElementById("eyeIcon").style.opacity = isPassword ? "0.4" : "1";
    });

    // Form submit
    document.getElementById("loginForm").addEventListener("submit", function (e) {
        e.preventDefault();

        if (!this.checkValidity()) {
            this.classList.add("was-validated");
            return;
        }

        document.getElementById("btnText").textContent = "Signing in...";
        document.getElementById("btnSpinner").classList.remove("d-none");
        document.getElementById("loginBtn").disabled = true;
        document.getElementById("loginError").classList.add("d-none");

        const data = new FormData(this);
        data.append("action", "login");

        fetch("../controllers/AuthController.php", {
            method: "POST",
            body: data
        })
            .then(res => res.json())
            .then(res => {
                if (res.status === "success") {
                    window.location = "animals.php";
                } else {
                    showError(res.message || "Login failed. Please try again.");
                }
            })
            .catch(() => showError("An unexpected error occurred. Please try again."));
    });

    function showError(msg) {
        const err = document.getElementById("loginError");
        err.textContent = msg;
        err.classList.remove("d-none");
        document.getElementById("btnText").textContent = "Login";
        document.getElementById("btnSpinner").classList.add("d-none");
        document.getElementById("loginBtn").disabled = false;
    }
</script>

<?php include "../views/footer.php"; ?>