<?php
include "../views/header.php";
require_once "../config/database.php";
require_once "../models/Animal.php";
$animals = Animal::getAll($pdo);
$availableCount = count(array_filter($animals, fn($a) => empty($a['is_adopted'])));
$adoptedCount = count(array_filter($animals, fn($a) => !empty($a['is_adopted'])));
$totalCount = count($animals);
?>

<!-- ======= HERO ======= -->
<section class="hero-pro shadow-lg" style="overflow: hidden; position: relative;">
    <video autoplay muted loop playsinline preload="auto" id="bgVideo"
        style="position: absolute; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: 0; transform: translate(-50%, -50%); object-fit: cover;">
        <source src="../assets/images/background.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="animate__animated animate__fadeInLeft reveal">
                    <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill reveal-1">Pet Adoption Platform</span>
                    <h1 class="display-2 fw-bold mb-3 text-white reveal-1">Find Your New <br><span
                            style="color: var(--primary-light);">Best Friend</span></h1>
                    <p class="lead mb-4 fs-4 text-white opacity-90 reveal-2">Every animal deserves a second chance at
                        happiness. Our platform connects you with trusted shelters to find the companion who will change
                        your life.</p>
                    <div class="d-flex gap-3 reveal-3">
                        <a href="animals.php" class="btn btn-adopt btn-lg px-5">Browse Pets</a>
                        <a href="about.php" class="btn btn-outline-light btn-lg rounded-pill px-5 fw-bold"
                            style="border-width: 2px;">Our Mission</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= STATS COUNTER ======= -->
<section class="py-5" style="background: linear-gradient(135deg, #7986c1ff 0%, #997bb7ff 100%);">
    <div class="container py-3">
        <div class="row g-4 text-center text-white">
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-4 fw-bold counter" data-target="<?= $totalCount ?>">0</h2>
                    <p class="mb-0 opacity-75 fw-semibold">Total Animals</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-4 fw-bold counter" data-target="<?= $adoptedCount ?>">0</h2>
                    <p class="mb-0 opacity-75 fw-semibold">Already Adopted</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-4 fw-bold counter" data-target="<?= $availableCount ?>">0</h2>
                    <p class="mb-0 opacity-75 fw-semibold">Waiting for You</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-4 fw-bold counter" data-target="3">0</h2>
                    <p class="mb-0 opacity-75 fw-semibold">Species Available</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= HOW IT WORKS ======= -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">How It Works</h2>
            <div class="value-line mx-auto mb-3"></div>
            <p class="text-muted fs-5">3 simple steps to find your new best friend</p>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100 shadow-sm border-0" style="background: #f8f5ff;">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                        style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea, #764ba2);">
                        <i class="fas fa-search fa-2x text-white"></i>
                    </div>
                    <div class="badge rounded-pill px-3 py-2 mb-3" style="background: #667eea;">Step 1</div>
                    <h4 class="fw-bold mb-3">Browse Pets</h4>
                    <p class="text-muted">Explore our catalogue of animals waiting for a loving home. Filter by type to
                        find your perfect match.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100 shadow-sm border-0" style="background: #f8f5ff;">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                        style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea, #764ba2);">
                        <i class="fas fa-file-alt fa-2x text-white"></i>
                    </div>
                    <div class="badge rounded-pill px-3 py-2 mb-3" style="background: #667eea;">Step 2</div>
                    <h4 class="fw-bold mb-3">Apply Online</h4>
                    <p class="text-muted">Fill in your adoption application with your personal information and lifestyle
                        details.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100 shadow-sm border-0" style="background: #f8f5ff;">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                        style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea, #764ba2);">
                        <i class="fas fa-heart fa-2x text-white"></i>
                    </div>
                    <div class="badge rounded-pill px-3 py-2 mb-3" style="background: #667eea;">Step 3</div>
                    <h4 class="fw-bold mb-3">Welcome Home!</h4>
                    <p class="text-muted">Once approved, your new companion is officially part of your family. Welcome
                        them home!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= FEATURED PETS ======= -->
<section class="py-5" style="background: #f8f5ff;">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Meet Our Pets</h2>
            <div class="value-line mx-auto mb-3"></div>
            <p class="text-muted fs-5">Some of our wonderful animals looking for a home</p>
        </div>
        <div class="row g-4">
            <?php
            $featured = array_filter($animals, fn($a) => empty($a['is_adopted']));
            $featured = array_slice($featured, 0, 3);
            foreach ($featured as $a): ?>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 animal-card">
                        <div class="position-relative"
                            style="height: 220px; overflow: hidden; border-radius: 1rem 1rem 0 0;">
                            <img src="../assets/images/<?= htmlspecialchars($a['image']) ?>"
                                alt="<?= htmlspecialchars($a['name']) ?>"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <span class="badge position-absolute top-0 end-0 m-3 px-3 py-2"
                                style="background: var(--primary); border-radius: 8px;">
                                <?= strtoupper(htmlspecialchars($a['type'])) ?>
                            </span>
                        </div>
                        <div class="card-body text-center p-4">
                            <h5 class="fw-bold mb-1"><?= htmlspecialchars($a['name']) ?></h5>
                            <p class="text-muted small mb-3"><?= htmlspecialchars($a['description'] ?? '') ?></p>
                            <a href="animals.php" class="btn btn-adopt w-100 rounded-3 py-2 fw-bold">
                                <i class="fas fa-heart me-2"></i> Adopt Me
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <a href="animals.php" class="btn btn-outline-primary btn-lg rounded-pill px-5 fw-bold">
                <i class="fas fa-paw me-2"></i> See All Pets
            </a>
        </div>
    </div>
</section>

<!-- ======= RESPONSIBILITIES ======= -->
<section class="stats-section py-5 position-relative"
    style="background: url('../assets/images/back.jpg') center/cover no-repeat fixed;">
    <div class="position-absolute top-0 start-0 w-100 h-100"
        style="background: linear-gradient(135deg, rgba(2, 6, 23, 0.96), rgba(139, 92, 246, 0.5)); opacity: 0.98; z-index: 1;">
    </div>
    <div class="container position-relative py-5" style="z-index: 2;">
        <div class="text-center mb-5 reveal">
            <h2 class="display-5 fw-bold text-white mb-4">Responsible Adoption</h2>
            <div class="value-line mx-auto" style="background: var(--white); opacity: 0.5;"></div>
            <p class="text-white opacity-75 mt-3 fs-5">Before inviting a new soul into your home, consider these
                essential points.</p>
        </div>
        <div class="row g-4 mt-2">
            <?php
            $questions = [
                "Am I ready for a long-term commitment?",
                "Am I aware of potential allergies in my household?",
                "Is my current living situation stable enough?",
                "Do I have enough time for exercise and care?",
                "Is there sufficient space for their needs?",
                "Can I afford pet food and medical care?"
            ];
            foreach ($questions as $i => $q): ?>
                <div class="col-md-6 col-lg-4">
                    <div
                        class="pro-glass p-4 h-100 d-flex align-items-start gap-4 transition-all question-card reveal-<?= ($i % 3) + 1 ?>">
                        <div class="step-number mb-0 flex-shrink-0 shadow-sm"
                            style="width: 45px; height: 45px; font-size: 1.2rem; background: var(--white); color: var(--primary-dark);">
                            <?= $i + 1 ?>
                        </div>
                        <p class="text-white mb-0 mt-2 fw-medium fs-5"><?= $q ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ======= TESTIMONIALS ======= -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Happy Families</h2>
            <div class="value-line mx-auto mb-3"></div>
            <p class="text-muted fs-5">Stories from people who found their best friend through AdoptMe</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 rounded-4 shadow-sm h-100" style="border-left: 4px solid #667eea;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white"
                            style="width: 50px; height: 50px; background: linear-gradient(135deg, #667eea, #764ba2); font-size: 1.2rem;">
                            S</div>
                        <div>
                            <h6 class="fw-bold mb-0">Sarah M.</h6>
                            <small class="text-muted">Adopted Luna 🐱</small>
                        </div>
                    </div>
                    <p class="text-muted fst-italic">"The process was so simple and the team was incredibly supportive.
                        Luna has changed our lives completely!"</p>
                    <div style="color: #f59e0b;">★★★★★</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 shadow-sm h-100" style="border-left: 4px solid #667eea;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white"
                            style="width: 50px; height: 50px; background: linear-gradient(135deg, #667eea, #764ba2); font-size: 1.2rem;">
                            A</div>
                        <div>
                            <h6 class="fw-bold mb-0">Ahmed K.</h6>
                            <small class="text-muted">Adopted Rex 🐶</small>
                        </div>
                    </div>
                    <p class="text-muted fst-italic">"I found Rex on AdoptMe and couldn't be happier. He's the most
                        loyal companion I could have asked for!"</p>
                    <div style="color: #f59e0b;">★★★★★</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 shadow-sm h-100" style="border-left: 4px solid #667eea;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white"
                            style="width: 50px; height: 50px; background: linear-gradient(135deg, #667eea, #764ba2); font-size: 1.2rem;">
                            M</div>
                        <div>
                            <h6 class="fw-bold mb-0">Maria L.</h6>
                            <small class="text-muted">Adopted Bluey 🦜</small>
                        </div>
                    </div>
                    <p class="text-muted fst-italic">"Bluey brings so much joy to our home every day. The adoption form
                        was clear and the whole experience was wonderful!"</p>
                    <div style="color: #f59e0b;">★★★★★</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= COMMITMENT ======= -->
<section class="values-section py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 pe-lg-5">
                <h2 class="display-4 fw-bold mb-4">Our Commitment</h2>
                <div class="value-line mb-4"></div>
                <p class="text-muted mb-4 fs-5" style="line-height: 1.8;">
                    At AdoptMe, we act as a bridge between animals in need and families looking for love. We partner
                    with shelters that strictly adhere to animal welfare standards.
                </p>
                <div class="p-4 bg-light rounded-4 mb-5 border-start border-primary border-4">
                    <p class="text-muted mb-0 fst-italic">"Adopting a pet won't change the world, but for that one
                        animal, the world will change forever."</p>
                </div>
                <a href="register.php" class="btn btn-adopt btn-lg shadow rounded-pill px-5">Join our community</a>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-6">
                        <div class="value-box shadow-sm mb-4 text-center">
                            <i class="fas fa-heart fa-3x mb-3" style="color: var(--primary);"></i>
                            <h4 class="fw-bold">Love</h4>
                        </div>
                        <div class="value-box shadow-sm text-center">
                            <i class="fas fa-shield-alt fa-3x mb-3" style="color: var(--primary);"></i>
                            <h4 class="fw-bold">Safety</h4>
                        </div>
                    </div>
                    <div class="col-6 mt-lg-5">
                        <div class="value-box shadow-sm mb-4 text-center">
                            <i class="fas fa-home fa-3x mb-3" style="color: var(--primary);"></i>
                            <h4 class="fw-bold">Welfare</h4>
                        </div>
                        <div class="value-box shadow-sm text-center">
                            <i class="fas fa-hands-helping fa-3x mb-3" style="color: var(--primary);"></i>
                            <h4 class="fw-bold">Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "../views/footer.php"; ?>

<script>
    // ── Scroll blur effect on video ──
    window.addEventListener('scroll', function () {
        let video = document.getElementById('bgVideo');
        if (!video) return;
        let value = window.scrollY;
        video.style.filter = `brightness(${1 - value * 0.001})`;
    });

    // ── Counter animation ──
    function animateCounter(el) {
        const target = parseInt(el.getAttribute('data-target'));
        const duration = 1500;
        const step = target / (duration / 16);
        let current = 0;
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                el.textContent = target + '+';
                clearInterval(timer);
            } else {
                el.textContent = Math.floor(current);
            }
        }, 16);
    }

    // ── Intersection Observer for counters ──
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.counter').forEach(el => counterObserver.observe(el));

    // ── Scroll reveal ──
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal, .reveal-1, .reveal-2, .reveal-3').forEach(el => {
        if (el.classList.contains('reveal')) revealObserver.observe(el);
    });
</script>