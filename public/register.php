<?php include "../views/header.php"; ?>

<section class="min-vh-100 d-flex align-items-center" style="background: #f0f2f5; padding: 2rem 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <div class="card border-0 overflow-hidden reveal reveal-1"
                    style="border-radius: var(--radius); box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
                    <div class="row g-0">

                        <!-- Left panel -->
                        <div class="col-md-4 d-none d-md-flex flex-column align-items-center justify-content-center p-5 text-white position-relative overflow-hidden"
                             style="background: #847cec; border-radius: var(--radius) 0 0 var(--radius); min-height: 650px;">
                            <div style="position: relative; z-index: 1; text-align: center; width: 100%; padding: 0 1rem;">
                                <!-- Paw Icon -->
                                <div style="margin-bottom: 2rem;">
                                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#FF8A00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="fill: #FF8A00; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));">
                                        <path d="M12 18s-2.5-1-4-5-1-6-1-7 2-3 4-3 4 2 4 3 .5 3-1 7-4 5-4 5z"/>
                                        <circle cx="7.5" cy="8.5" r="2" fill="#FF8A00" stroke="#000" stroke-width="2"/>
                                        <circle cx="11.5" cy="5.5" r="2" fill="#FF8A00" stroke="#000" stroke-width="2"/>
                                        <circle cx="16.5" cy="8.5" r="2" fill="#FF8A00" stroke="#000" stroke-width="2"/>
                                        <path d="M12 18s-2.5-1-4-5-1-6-1-7 2-3 4-3 4 2 4 3 .5 3-1 7-4 5-4 5z" fill="#FF8A00" stroke="#000" stroke-width="2"/>
                                    </svg>
                                </div>
                                <h3 style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #fff; letter-spacing: -0.01em; margin-bottom: 1rem;">Join the AdoptMe<br>family</h3>
                                <p style="color: rgba(255,255,255,0.85); font-size: 14px; line-height: 1.6; margin-bottom: 3rem;">
                                    Create an account and start your<br>journey to find a furry<br>companion.
                                </p>

                                <!-- Steps -->
                                <div class="text-start mx-auto" style="max-width: 280px;">
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center"
                                            style="width: 36px; height: 36px; min-width: 36px; border-radius: 50%; font-size: 14px; font-weight: 600; background: #fff; color: #847cec; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                            1</div>
                                        <span style="font-size: 15px; color: white; font-weight: 500;">Create your account</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center"
                                            style="width: 36px; height: 36px; min-width: 36px; border-radius: 50%; font-size: 14px; font-weight: 600; background: rgba(0,0,0,0.15); color: rgba(255,255,255,0.8);">
                                            2</div>
                                        <span style="font-size: 15px; color: rgba(255,255,255,0.8);">Browse available pets</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center"
                                            style="width: 36px; height: 36px; min-width: 36px; border-radius: 50%; font-size: 14px; font-weight: 600; background: rgba(0,0,0,0.15); color: rgba(255,255,255,0.8);">
                                            3</div>
                                        <span style="font-size: 15px; color: rgba(255,255,255,0.8);">Submit adoption request</span>
                                    </div>
                                </div>

                                <!-- Stats -->
                                <div class="d-flex gap-5 justify-content-center mt-5 pt-4 mx-auto"
                                    style="border-top: 1px solid rgba(255,255,255,0.2); max-width: 280px;">
                                    <div>
                                        <div style="font-family: 'Outfit', sans-serif; font-size: 24px; font-weight: 700; color: #fff;">500+</div>
                                        <div style="font-size: 12px; color: rgba(255,255,255,0.85);">Pets rescued</div>
                                    </div>
                                    <div>
                                        <div style="font-family: 'Outfit', sans-serif; font-size: 24px; font-weight: 700; color: #10b981;">98%</div>
                                        <div style="font-size: 12px; color: rgba(255,255,255,0.85);">Happy families</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right panel: form -->
                        <div class="col-md-8 p-4 p-md-5"
                            style="background: #383b42; color: white; border-radius: 0 var(--radius) var(--radius) 0;">

                            <h3 style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #fff; margin-bottom: 0.25rem;">Create account</h3>
                            <p style="color: #b0b4ba; font-size: 15px; margin-bottom: 2rem;">Join AdoptMe and find your forever friend</p>

                            <!-- Error / success alerts -->
                            <div id="registerError" class="alert d-none py-2 mb-3" role="alert" style="font-size: 14px; border-radius: 8px; background: rgba(220, 53, 69, 0.1); color: #ff8a8a; border: 1px solid rgba(220, 53, 69, 0.2);"></div>
                            <div id="registerSuccess" class="alert d-none py-2 mb-3" role="alert" style="font-size: 14px; border-radius: 8px; background: rgba(16, 185, 129, 0.1); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.2);"></div>


                            <form id="registerForm" novalidate>

                                <!-- Name + Phone row -->
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-6">
                                        <label class="form-label mb-1" style="font-size: 13px; color: #b0b4ba; font-weight: 600;">Full name</label>
                                        <input name="name" type="text" class="form-control" placeholder="John Doe" required minlength="2"
                                               style="border-radius: 8px; font-size: 14px; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.1); background: #2f3238; color: white;">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label mb-1" style="font-size: 13px; color: #b0b4ba; font-weight: 600;">Phone number</label>
                                        <input name="phone" type="tel" class="form-control" placeholder="+213 6xx xxx xxx"
                                               style="border-radius: 8px; font-size: 14px; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.1); background: #2f3238; color: white;">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label mb-1" style="font-size: 13px; color: #b0b4ba; font-weight: 600;">Email address</label>
                                    <input name="email" type="email" class="form-control" placeholder="you@example.com" required
                                           style="border-radius: 8px; font-size: 14px; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.1); background: #2f3238; color: white;">
                                </div>

                                <!-- Password -->
                                <div class="mb-1">
                                    <label class="form-label mb-1" style="font-size: 13px; color: #b0b4ba; font-weight: 600;">Password</label>
                                    <div class="input-group">
                                        <input name="password" type="password" id="passwordInput" class="form-control border-end-0" placeholder="••••••••••" required minlength="8"
                                               style="border-radius: 8px 0 0 8px; font-size: 14px; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.1); background: #2f3238; color: white;">
                                        <button type="button" id="togglePassword" class="btn border-start-0"
                                                style="border-radius: 0 8px 8px 0; border: 1px solid rgba(255,255,255,0.1); border-left: none; background: #2f3238; color: #888; padding: 0 14px;" tabindex="-1">
                                            <svg id="eyeIcon1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Password strength bar -->
                                <div class="mb-3">
                                    <div style="height: 4px; background: rgba(255,255,255,0.1); border-radius: 99px; overflow: hidden; margin-top: 4px;">
                                        <div id="strengthBar" style="height: 100%; width: 0%; border-radius: 99px; transition: all 0.4s cubic-bezier(0.4,0,0.2,1); background: #ef4444;"></div>
                                    </div>
                                    <div id="strengthLabel" style="font-size: 12px; margin-top: 4px;"></div>
                                </div>

                                <!-- Confirm password -->
                                <div class="mb-4">
                                    <label class="form-label mb-1" style="font-size: 13px; color: #b0b4ba; font-weight: 600;">Confirm password</label>
                                    <div class="input-group">
                                        <input name="confirm_password" type="password" id="confirmInput" class="form-control border-end-0" placeholder="••••••••••" required
                                               style="border-radius: 8px 0 0 8px; font-size: 14px; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.1); background: #2f3238; color: white;">
                                        <button type="button" id="toggleConfirm" class="btn border-start-0"
                                                style="border-radius: 0 8px 8px 0; border: 1px solid rgba(255,255,255,0.1); border-left: none; background: #2f3238; color: #888; padding: 0 14px;" tabindex="-1">
                                            <svg id="eyeIcon2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Terms checkbox -->
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="agreeTerms" name="terms" required 
                                           style="accent-color: #847cec; border-color: rgba(255,255,255,0.2); background-color: #2f3238;">
                                    <label class="form-check-label" for="agreeTerms" style="font-size: 14px; color: #cccccc;">
                                        I agree to the <a href="terms.php" style="color: #a49ef2; text-decoration: none;">Terms of Service</a>
                                        and <a href="privacy.php" style="color: #a49ef2; text-decoration: none;">Privacy Policy</a>
                                    </label>
                                </div>

                                <!-- Submit -->
                                <button type="submit" id="registerBtn" class="btn w-100 d-flex align-items-center justify-content-center gap-2" 
                                        style="background: #847cec; color: white; border-radius: 8px; font-size: 16px; font-weight: 500; padding: 12px; border: none; box-shadow: 0 4px 12px rgba(132,124,236,0.3);">
                                    <span id="btnText">Create account</span>
                                    <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                                </button>

                                <!-- Trust note -->
                                <p class="text-center mt-3 mb-0" style="font-size: 13px; color: #888;">
                                    🔒 We never share your personal data with third parties.
                                </p>

                            </form>

                            <p class="text-center mt-4 mb-0" style="font-size: 14px; color: #b0b4ba;">
                                Already have an account?
                                <a href="login.php" style="color: #a49ef2; text-decoration: none;">Login here</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Show/hide password toggles
    function togglePass(inputId, iconId) {
        const input = document.getElementById(inputId);
        const isPassword = input.type === "password";
        input.type = isPassword ? "text" : "password";
        document.getElementById(iconId).style.opacity = isPassword ? "0.4" : "1";
    }
    document.getElementById("togglePassword").addEventListener("click", () => togglePass("passwordInput", "eyeIcon1"));
    document.getElementById("toggleConfirm").addEventListener("click", () => togglePass("confirmInput", "eyeIcon2"));

    // Password strength meter
    document.getElementById("passwordInput").addEventListener("input", function () {
        const val = this.value;
        const bar = document.getElementById("strengthBar");
        const label = document.getElementById("strengthLabel");

        let strength = 0;
        if (val.length >= 8) strength++;
        if (/[A-Z]/.test(val)) strength++;
        if (/[0-9]/.test(val)) strength++;
        if (/[^A-Za-z0-9]/.test(val)) strength++;

        const levels = [
            { width: "0%", color: "#ef4444", text: "" },
            { width: "25%", color: "#ef4444", text: "Weak" },
            { width: "50%", color: "#f97316", text: "Fair" },
            { width: "75%", color: "#eab308", text: "Good" },
            { width: "100%", color: "#10b981", text: "Strong 💪" },
        ];

        const lvl = levels[strength];
        bar.style.width = lvl.width;
        bar.style.background = lvl.color;
        label.textContent = lvl.text;
        label.style.color = lvl.color;
    });

    // Register form submit
    document.getElementById("registerForm").addEventListener("submit", function (e) {
        e.preventDefault();

        // Check passwords match
        const pass = document.getElementById("passwordInput").value;
        const confirm = document.getElementById("confirmInput");
        if (pass !== confirm.value) {
            confirm.setCustomValidity("Passwords do not match.");
        } else {
            confirm.setCustomValidity("");
        }

        if (!this.checkValidity()) {
            this.classList.add("was-validated");
            return;
        }

        // Loading state
        document.getElementById("btnText").textContent = "Creating account...";
        document.getElementById("btnSpinner").classList.remove("d-none");
        document.getElementById("registerBtn").disabled = true;
        document.getElementById("registerError").classList.add("d-none");

        const data = new FormData(this);
        data.append("action", "register");

        fetch("../controllers/AuthController.php", {
            method: "POST",
            body: data
        })
            .then(res => res.json())
            .then(res => {
                if (res.status === "success") {
                    const ok = document.getElementById("registerSuccess");
                    ok.textContent = "Account created! Redirecting...";
                    ok.classList.remove("d-none");
                    setTimeout(() => window.location = "login.php", 1500);
                } else {
                    showError(res.message || "Registration failed. Please try again.");
                }
            })
            .catch(() => showError("An unexpected error occurred. Please try again."));
    });

    // Reset confirm validation on change
    document.getElementById("confirmInput").addEventListener("input", function () {
        this.setCustomValidity("");
    });

    function showError(msg) {
        const err = document.getElementById("registerError");
        err.textContent = msg;
        err.classList.remove("d-none");
        document.getElementById("btnText").textContent = "Create account";
        document.getElementById("btnSpinner").classList.add("d-none");
        document.getElementById("registerBtn").disabled = false;
    }
</script>

<?php include "../views/footer.php"; ?>