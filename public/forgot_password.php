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
                            style="background: #847cec; border-radius: var(--radius) 0 0 var(--radius); min-height: 520px;">
                            <div style="position: relative; z-index: 1; text-align: center;">
                                <div style="margin-bottom: 2rem;">
                                    <div style="width: 90px; height: 90px; background: rgba(255,255,255,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; border: 2px solid rgba(255,255,255,0.3);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                    </div>
                                </div>
                                <h3 style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #fff; letter-spacing: -0.01em; margin-bottom: 1rem;">
                                    Forgot your password?
                                </h3>
                                <p style="color: rgba(255,255,255,0.85); font-size: 15px; line-height: 1.6; margin-bottom: 3rem;">
                                    No worries! Enter your email and we'll send you a link to reset your password.
                                </p>
                                <div class="d-flex gap-3 flex-wrap justify-content-center">
                                    <span class="badge rounded-pill px-4 py-2"
                                        style="background: rgba(0,0,0,0.15); color: #fff; font-size: 13px; font-weight: 500;">🔒 Secure</span>
                                    <span class="badge rounded-pill px-4 py-2"
                                        style="background: rgba(0,0,0,0.15); color: #fff; font-size: 13px; font-weight: 500;">⚡ Instant</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right panel -->
                        <div class="col-md-7 p-4 p-md-5"
                            style="background: #383b42; color: white; border-radius: 0 var(--radius) var(--radius) 0;">

                            <!-- Step 1: Email input -->
                            <div id="stepEmail">
                                <h3 style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #fff; margin-bottom: 0.25rem;">
                                    Reset password
                                </h3>
                                <p style="color: #b0b4ba; font-size: 15px; margin-bottom: 2rem;">
                                    Enter the email linked to your AdoptMe account.
                                </p>

                                <div id="fpError" class="alert d-none py-2 mb-3" role="alert"
                                    style="font-size: 14px; border-radius: 8px; background: rgba(220,53,69,0.1); color: #ff8a8a; border: 1px solid rgba(220,53,69,0.2);">
                                </div>

                                <form id="fpForm" novalidate>
                                    <div class="mb-4">
                                        <label class="form-label mb-1" style="font-size: 13px; color: #b0b4ba; font-weight: 600;">Email address</label>
                                        <input name="email" type="email" id="emailInput" class="form-control"
                                            placeholder="you@example.com" required
                                            style="border-radius: 8px; font-size: 14px; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.1); background: #2f3238; color: white;">
                                    </div>

                                    <button type="submit" id="fpBtn"
                                        class="btn w-100 d-flex align-items-center justify-content-center gap-2"
                                        style="background: #847cec; color: white; border-radius: 8px; font-size: 16px; font-weight: 500; padding: 12px; border: none; box-shadow: 0 4px 12px rgba(132,124,236,0.3);">
                                        <span id="fpBtnText">Send reset link</span>
                                        <span id="fpSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                                    </button>
                                </form>

                                <p class="text-center mt-4 mb-0" style="font-size: 14px; color: #b0b4ba;">
                                    Remember your password?
                                    <a href="login.php" style="color: #a49ef2; text-decoration: none;">Back to login</a>
                                </p>
                            </div>

                            <!-- Step 2: Reset form -->
                            <div id="stepSuccess" class="d-none">
                                <div class="text-center mb-4">
                                    <div style="width: 72px; height: 72px; background: rgba(16,185,129,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; border: 2px solid rgba(16,185,129,0.3);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <h3 style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #fff; margin-bottom: 0.4rem;">Check your inbox!</h3>
                                    <p style="color: #b0b4ba; font-size: 14px; margin: 0;">
                                        A reset link was sent to <strong id="sentEmail" style="color: #a49ef2;"></strong>
                                    </p>
                                </div>

                                <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem;">
                                    <p style="color: #b0b4ba; font-size: 13px; margin-bottom: 1rem;">🔑 Reset directly here:</p>

                                    <form id="resetForm" novalidate>
                                        <div class="mb-3">
                                            <label class="form-label mb-1" style="font-size: 13px; color: #b0b4ba; font-weight: 600;">New password</label>
                                            <div class="input-group">
                                                <input type="password" id="newPassword" name="new_password" class="form-control border-end-0"
                                                    placeholder="••••••••••" required minlength="8"
                                                    style="border-radius: 8px 0 0 8px; font-size: 14px; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.1); background: #2f3238; color: white;">
                                                <button type="button" class="btn border-start-0" onclick="toggleNewPass()" tabindex="-1"
                                                    style="border-radius: 0 8px 8px 0; border: 1px solid rgba(255,255,255,0.1); border-left: none; background: #2f3238; color: #888; padding: 0 14px;">
                                                    <svg id="eyeNew" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div style="height: 4px; background: rgba(255,255,255,0.1); border-radius: 99px; overflow: hidden; margin-top: 6px;">
                                                <div id="strengthBar" style="height: 100%; width: 0%; border-radius: 99px; transition: all 0.4s ease; background: #ef4444;"></div>
                                            </div>
                                            <div id="strengthLabel" style="font-size: 12px; margin-top: 3px;"></div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label mb-1" style="font-size: 13px; color: #b0b4ba; font-weight: 600;">Confirm password</label>
                                            <input type="password" id="confirmNewPassword" name="confirm_password" class="form-control"
                                                placeholder="••••••••••" required
                                                style="border-radius: 8px; font-size: 14px; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.1); background: #2f3238; color: white;">
                                        </div>

                                        <div id="resetError" class="alert d-none py-2 mb-3" role="alert"
                                            style="font-size: 14px; border-radius: 8px; background: rgba(220,53,69,0.1); color: #ff8a8a; border: 1px solid rgba(220,53,69,0.2);">
                                        </div>

                                        <button type="submit" id="resetBtn"
                                            class="btn w-100 d-flex align-items-center justify-content-center gap-2"
                                            style="background: #10b981; color: white; border-radius: 8px; font-size: 15px; font-weight: 500; padding: 12px; border: none; box-shadow: 0 4px 12px rgba(16,185,129,0.3);">
                                            <span id="resetBtnText">Update password</span>
                                            <span id="resetSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                                        </button>
                                    </form>
                                </div>

                                <p class="text-center mt-4 mb-0" style="font-size: 14px; color: #b0b4ba;">
                                    <a href="login.php" style="color: #a49ef2; text-decoration: none;">← Back to login</a>
                                </p>
                            </div>

                            <!-- Step 3: Done -->
                            <div id="stepDone" class="d-none text-center py-5">
                                <div style="font-size: 3rem; margin-bottom: 1rem;">🎉</div>
                                <h3 style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #fff; margin-bottom: 0.75rem;">
                                    Password updated!
                                </h3>
                                <p style="color: #b0b4ba; font-size: 15px; margin-bottom: 2rem;">
                                    Your password has been changed successfully.
                                </p>
                                <a href="login.php" class="btn"
                                    style="background: #847cec; color: white; border-radius: 8px; font-size: 15px; font-weight: 500; padding: 12px 32px; border: none; box-shadow: 0 4px 12px rgba(132,124,236,0.3); text-decoration: none;">
                                    Go to Login
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let userEmail = "";

    // Step 1: Submit email
    document.getElementById("fpForm").addEventListener("submit", function (e) {
        e.preventDefault();
        if (!this.checkValidity()) { this.classList.add("was-validated"); return; }

        userEmail = document.getElementById("emailInput").value.trim();
        document.getElementById("fpBtnText").textContent = "Sending...";
        document.getElementById("fpSpinner").classList.remove("d-none");
        document.getElementById("fpBtn").disabled = true;
        document.getElementById("fpError").classList.add("d-none");

        const data = new FormData();
        data.append("action", "forgot_password");
        data.append("email", userEmail);

        fetch("../controllers/AuthController.php", { method: "POST", body: data })
            .then(res => res.json())
            .then(res => {
                // Always show success screen for security (don't reveal if email exists)
                document.getElementById("sentEmail").textContent = userEmail;
                document.getElementById("stepEmail").classList.add("d-none");
                document.getElementById("stepSuccess").classList.remove("d-none");
            })
            .catch(() => {
                // Even on network error, show step 2 (demo mode)
                document.getElementById("sentEmail").textContent = userEmail;
                document.getElementById("stepEmail").classList.add("d-none");
                document.getElementById("stepSuccess").classList.remove("d-none");
            });
    });

    // Toggle new password visibility
    function toggleNewPass() {
        const inp = document.getElementById("newPassword");
        const isPass = inp.type === "password";
        inp.type = isPass ? "text" : "password";
        document.getElementById("eyeNew").style.opacity = isPass ? "0.4" : "1";
    }

    // Password strength meter
    document.getElementById("newPassword").addEventListener("input", function () {
        const val = this.value;
        let strength = 0;
        if (val.length >= 8) strength++;
        if (/[A-Z]/.test(val)) strength++;
        if (/[0-9]/.test(val)) strength++;
        if (/[^A-Za-z0-9]/.test(val)) strength++;
        const levels = [
            { width: "0%",   color: "#ef4444", text: "" },
            { width: "25%",  color: "#ef4444", text: "Weak" },
            { width: "50%",  color: "#f97316", text: "Fair" },
            { width: "75%",  color: "#eab308", text: "Good" },
            { width: "100%", color: "#10b981", text: "Strong 💪" },
        ];
        const lvl = levels[strength];
        document.getElementById("strengthBar").style.width = lvl.width;
        document.getElementById("strengthBar").style.background = lvl.color;
        document.getElementById("strengthLabel").textContent = lvl.text;
        document.getElementById("strengthLabel").style.color = lvl.color;
    });

    // Step 2: Reset password
    document.getElementById("resetForm").addEventListener("submit", function (e) {
        e.preventDefault();
        const newPass    = document.getElementById("newPassword").value;
        const confirmInp = document.getElementById("confirmNewPassword");
        confirmInp.setCustomValidity(newPass !== confirmInp.value ? "Passwords do not match." : "");
        if (!this.checkValidity()) { this.classList.add("was-validated"); return; }

        document.getElementById("resetBtnText").textContent = "Updating...";
        document.getElementById("resetSpinner").classList.remove("d-none");
        document.getElementById("resetBtn").disabled = true;
        document.getElementById("resetError").classList.add("d-none");

        const data = new FormData();
        data.append("action", "reset_password");
        data.append("email", userEmail);
        data.append("new_password", newPass);

        fetch("../controllers/AuthController.php", { method: "POST", body: data })
            .then(res => res.json())
            .then(res => {
                if (res.status === "success") {
                    document.getElementById("stepSuccess").classList.add("d-none");
                    document.getElementById("stepDone").classList.remove("d-none");
                } else {
                    showResetError(res.message || "Update failed. Please try again.");
                }
            })
            .catch(() => showResetError("Network error. Please try again."));
    });

    document.getElementById("confirmNewPassword").addEventListener("input", function () {
        this.setCustomValidity("");
    });

    function showResetError(msg) {
        const err = document.getElementById("resetError");
        err.textContent = msg;
        err.classList.remove("d-none");
        document.getElementById("resetBtnText").textContent = "Update password";
        document.getElementById("resetSpinner").classList.add("d-none");
        document.getElementById("resetBtn").disabled = false;
    }
</script>

<?php include "../views/footer.php"; ?>
