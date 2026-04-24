<?php include "../views/header.php"; ?>

<!-- About Hero Section -->
<section class="position-relative py-5" style="background: url('https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&q=80&w=1500') center/cover no-repeat; height: 50vh;">
    <div class="position-absolute top-0 left-0 w-100 h-100" style="background: linear-gradient(to bottom, rgba(127, 95, 197, 0.4), rgba(255, 250, 246, 1));"></div>
    <div class="container h-100 d-flex flex-column justify-content-center position-relative text-center">
        <h1 class="display-2 fw-bold" style="color: var(--primary);">Our Story</h1>
        <p class="fs-4 text-dark opacity-75">Making the world a better place, one adoption at a time.</p>
    </div>
</section>

<!-- Overlapping Content Section -->
<section class="py-5" style="margin-top: -100px;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-10">
                <div class="pro-glass p-5 shadow-lg border-0" style="background-color: var(--bg-warm);">
                    <div class="row align-items-center g-5">
                        <div class="col-md-6">
                            <h2 class="fw-bold mb-4" style="color: var(--primary);">Who We Are</h2>
                            <p class="text-muted fs-5 mb-4" style="line-height: 1.8;">
                                Founded with a simple mission—to connect every lonely pet with a loving family—<strong>AdoptMe</strong> has grown into a community of thousands. 
                            </p>
                            <p class="text-muted fs-5 mb-4" style="line-height: 1.8;">
                                We don't just provide animals; we provide lifetimes of companionship. Our team works tirelessly to ensure that every adoption is a perfect match.
                            </p>
                            <div class="d-flex gap-3 mt-4">
                                <div class="text-center">
                                    <h3 class="fw-bold mb-0" style="color: var(--secondary);">1k+</h3>
                                    <small class="text-muted">Happy Pets</small>
                                </div>
                                <div class="vr text-muted"></div>
                                <div class="text-center">
                                    <h3 class="fw-bold mb-0" style="color: var(--accent);">500+</h3>
                                    <small class="text-muted">Families</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="../assets/images/back.jpg" alt="Our Journey" class="img-fluid rounded-4 shadow-sm" style="width: 100%; height: 350px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Our Core Values</h2>
        <div class="mx-auto bg-primary rounded-pill" style="height: 5px; width: 60px;"></div>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="text-center p-4">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-block p-4 mb-3">
                    <i class="fas fa-heart text-primary fs-2"></i>
                </div>
                <h4>Passion</h4>
                <p class="text-muted">We love what we do and are dedicated to pet welfare above all else.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center p-4">
                <div class="bg-accent bg-opacity-10 rounded-circle d-inline-block p-4 mb-3">
                    <i class="fas fa-shield-alt text-accent fs-2"></i>
                </div>
                <h4>Integrity</h4>
                <p class="text-muted">Transparency and honesty in every step of the adoption process.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center p-4">
                <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-block p-4 mb-3">
                    <i class="fas fa-users text-secondary fs-2"></i>
                </div>
                <h4>Community</h4>
                <p class="text-muted">Supporting families and pet owners for life, not just for a day.</p>
            </div>
        </div>
    </div>
</div>


<?php include "../views/footer.php"; ?>