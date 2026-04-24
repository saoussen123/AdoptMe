<?php include "../views/header.php"; ?>

<section class="py-5" style="background: url('https://images.unsplash.com/photo-1450778869180-41d0601e046e?auto=format&fit=crop&q=80&w=1500') center/cover no-repeat; background-attachment: fixed; min-height: 90vh;">
    <div class="hero-overlay" style="background: rgba(255, 250, 246, 0.85); z-index: 0;"></div>
    <div class="container py-5 position-relative" style="z-index: 1;">
        <div class="text-center mb-5 animate__animated animate__fadeIn">
            <h1 class="display-4 fw-bold mb-3" style="color: var(--primary);">Contact Our Team</h1>
            <p class="text-muted fs-5">We are here to help you every step of the way.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Luxury Info Cards -->
            <div class="col-lg-10">
                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="p-4 rounded-4 shadow-sm text-center border-0 h-100" style="background-color: var(--bg-warm);">
                            <div class="mb-3 text-primary bg-primary bg-opacity-10 d-inline-block p-3 rounded-circle">
                                <i class="fas fa-phone-alt fs-4"></i>
                            </div>
                            <h5 class="fw-bold">Call Us</h5>
                            <p class="text-muted small">Available Mon-Fri, 9am-6pm</p>
                            <p class="fw-bold mb-0">+1 (555) 000-1111</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 rounded-4 shadow-sm text-center border-0 h-100" style="background-color: var(--bg-warm);">
                            <div class="mb-3 text-success bg-success bg-opacity-10 d-inline-block p-3 rounded-circle">
                                <i class="fas fa-envelope fs-4"></i>
                            </div>
                            <h5 class="fw-bold">Email Us</h5>
                            <p class="text-muted small">We reply within 24 hours</p>
                            <p class="fw-bold mb-0">hello@adoptme.org</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 rounded-4 shadow-sm text-center border-0 h-100" style="background-color: var(--bg-warm);">
                            <div class="mb-3 text-warning bg-warning bg-opacity-10 d-inline-block p-3 rounded-circle">
                                <i class="fas fa-map-marker-alt fs-4"></i>
                            </div>
                            <h5 class="fw-bold">Visit Us</h5>
                            <p class="text-muted small">Our sanctuary office</p>
                            <p class="fw-bold mb-0">123 Pet Lane, City</p>
                        </div>
                    </div>
                </div>

                <!-- Main Contact Form Card -->
                <div class="rounded-5 shadow-lg border-0 overflow-hidden" style="background-color: var(--bg-warm);">
                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-block" style="background: url('https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&q=80&w=1000') center/cover no-repeat;">
                        </div>
                        <div class="col-lg-6 p-5" style="background-color: var(--bg-warm);">
                            <h3 class="fw-bold mb-4">Send a Message</h3>
                            <form id="contactForm">
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold">FULL NAME</label>
                                    <input type="text" name="name" class="form-control form-control-lg border-opacity-10" placeholder="John Doe" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold">EMAIL ADDRESS</label>
                                    <input type="email" name="email" class="form-control form-control-lg border-opacity-10" placeholder="john@example.com" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label text-muted small fw-bold">YOUR MESSAGE</label>
                                    <textarea name="message" class="form-control form-control-lg border-opacity-10" rows="4" placeholder="How can we help?" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-adopt btn-lg w-100 py-3 shadow-sm">
                                    Send Message <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById("contactForm").addEventListener("submit", function (e) {
        e.preventDefault();
        alert("Message sent successfully! We'll get back to you soon. 🐾");
        this.reset();
    });
</script>

<?php include "../views/footer.php"; ?>
