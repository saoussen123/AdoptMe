<?php include "../views/header.php"; ?>

<section class="hero-pro shadow-lg" style="overflow: hidden; position: relative;">
    <!-- Video Background (MP4) -->
    <video autoplay muted loop playsinline preload="auto" id="bgVideo"
           style="position: absolute; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: 0; transform: translate(-50%, -50%); object-fit: cover;">
        <source src="assets/images/background.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <div class="hero-overlay"></div>
    
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="pro-glass p-5 animate__animated animate__fadeInLeft rounded-4 reveal">
                    <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill reveal-1">Pet Adoption Platform</span>
                    <h1 class="display-2 fw-bold mb-3 text-white reveal-1">Find Your New <br><span style="color: var(--primary-light);">Best Friend</span></h1>
                    <p class="lead mb-4 fs-4 text-white opacity-90 reveal-2">Every animal deserves a second chance at happiness. Our platform connects you with trusted shelters to find the companion who will change your life.</p>
                    <div class="d-flex gap-3 reveal-3">
                        <a href="animals.php" class="btn btn-adopt btn-lg px-5">Browse Pets</a>
                        <a href="about.php" class="btn btn-outline-light btn-lg rounded-pill px-5 fw-bold" style="border-width: 2px;">Our Mission</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Featured Pets ======= -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row align-items-end mb-5">
            <div class="col-md-8">
                <h2 class="display-4 fw-bold mb-3">Waiting for a Family</h2>
                <div class="value-line"></div>
                <p class="text-muted mt-3 fs-5">Meet some of our wonderful residents who are currently looking for a forever home.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="animals.php" class="text-primary fw-bold text-decoration-none fs-5">View all companions <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="row g-4 reveal">
            <!-- Clover -->
            <div class="col-md-3">
                <div class="animal-card card h-100 shadow-sm border-0 overflow-hidden reveal-1">
                    <div class="position-relative">
                        <img src="assets/images/cat1.jpg" class="card-img-top" alt="Cat" style="height: 300px; object-fit: cover;">
                        <span class="position-absolute top-0 end-0 m-3 badge bg-white text-primary px-3 py-2 rounded-pill fw-bold">Sponsorship</span>
                    </div>
                    <div class="card-body text-center p-4">
                        <h4 class="fw-bold mb-1">Clover</h4>
                        <p class="text-muted mb-2 fw-semibold">Domestic Shorthair</p>
                        <p class="small text-secondary mb-4"><i class="far fa-calendar-alt me-2"></i>Born: Feb 2009</p>
                        <button class="btn btn-outline-primary rounded-pill px-4 w-100 fw-bold view-details-btn" 
                                data-name="Clover" 
                                data-type="Cat" 
                                data-breed="Domestic Shorthair" 
                                data-birth="Feb 2009" 
                                data-gender="Female"
                                data-image="assets/images/cat1.jpg"
                                data-status="Sponsorship"
                                data-desc="Clover is a sweet and gentle soul who has been with us for a while. She loves quiet afternoons and chasing laser pointers. Perfect for a calm indoor environment.">Meet Clover</button>
                    </div>
                </div>
            </div>
            <!-- Mady -->
            <div class="col-md-3">
                <div class="animal-card card h-100 shadow-sm border-0 overflow-hidden reveal-2">
                    <div class="position-relative">
                        <img src="assets/images/dog1.jpg" class="card-img-top" alt="Mady" style="height: 300px; object-fit: cover;">
                        <span class="position-absolute top-0 end-0 m-3 badge bg-white text-primary px-3 py-2 rounded-pill fw-bold">Available</span>
                    </div>
                    <div class="card-body text-center p-4">
                        <h4 class="fw-bold mb-1">Mady</h4>
                        <p class="text-muted mb-2 fw-semibold">Golden Retriever Mix</p>
                        <p class="small text-secondary mb-4"><i class="far fa-calendar-alt me-2"></i>Born: Jan 2024</p>
                        <button class="btn btn-outline-primary rounded-pill px-4 w-100 fw-bold view-details-btn"
                                data-name="Mady" 
                                data-type="Dog" 
                                data-breed="Golden Retriever Mix" 
                                data-birth="Jan 2024" 
                                data-gender="Female"
                                data-image="assets/images/dog1.jpg"
                                data-status="Available"
                                data-desc="Mady is a bundle of joy! She is energetic, loves to play fetch, and is great with children. She is looking for an active family to share her love with.">Meet Mady</button>
                    </div>
                </div>
            </div>
            <!-- Gina -->
            <div class="col-md-3">
                <div class="animal-card card h-100 shadow-sm border-0 overflow-hidden reveal-3">
                    <div class="position-relative">
                        <img src="assets/images/dog2.jpg" class="card-img-top" alt="Gina" style="height: 300px; object-fit: cover;">
                        <span class="position-absolute top-0 end-0 m-3 badge bg-white text-primary px-3 py-2 rounded-pill fw-bold">Available</span>
                    </div>
                    <div class="card-body text-center p-4">
                        <h4 class="fw-bold mb-1">Gina</h4>
                        <p class="text-muted mb-2 fw-semibold">Border Collie</p>
                        <p class="small text-secondary mb-4"><i class="far fa-calendar-alt me-2"></i>Born: Jan 2024</p>
                        <button class="btn btn-outline-primary rounded-pill px-4 w-100 fw-bold view-details-btn"
                                data-name="Gina" 
                                data-type="Dog" 
                                data-breed="Border Collie" 
                                data-birth="Jan 2024" 
                                data-gender="Female"
                                data-image="assets/images/dog2.jpg"
                                data-status="Available"
                                data-desc="Gina is highly intelligent and needs plenty of mental stimulation. She would thrive in a home that enjoys training and outdoor adventures.">Meet Gina</button>
                    </div>
                </div>
            </div>
            <!-- Boris -->
            <div class="col-md-3">
                <div class="animal-card card h-100 shadow-sm border-0 overflow-hidden reveal-4">
                    <div class="position-relative">
                        <img src="assets/images/dog3.jpg" class="card-img-top" alt="Boris" style="height: 300px; object-fit: cover;">
                        <span class="position-absolute top-0 end-0 m-3 badge bg-white text-primary px-3 py-2 rounded-pill fw-bold">Available</span>
                    </div>
                    <div class="card-body text-center p-4">
                        <h4 class="fw-bold mb-1">Boris</h4>
                        <p class="text-muted mb-2 fw-semibold">Husky</p>
                        <p class="small text-secondary mb-4"><i class="far fa-calendar-alt me-2"></i>Born: Jan 2024</p>
                        <button class="btn btn-outline-primary rounded-pill px-4 w-100 fw-bold view-details-btn"
                                data-name="Boris" 
                                data-type="Dog" 
                                data-breed="Siberian Husky" 
                                data-birth="Jan 2024" 
                                data-gender="Male"
                                data-image="assets/images/dog3.jpg"
                                data-status="Available"
                                data-desc="Boris is a talkative and friendly Husky. He loves the cold and long walks. He's looking for an experienced owner who understands the breed.">Meet Boris</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Animal Details Modal ======= -->
<div class="modal fade animal-modal" id="animalDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="position-relative">
                <img src="" id="modalAnimalImage" class="modal-header-img" alt="Animal Image">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 start-0 m-4" data-bs-dismiss="modal" aria-label="Close" style="filter: drop-shadow(0 2px 4px rgba(0,0,0,0.5));"></button>
                <div id="modalAnimalStatus" class="animal-badge bg-primary text-white shadow">Available</div>
            </div>
            <div class="modal-body p-5">
                <div class="row align-items-center mb-4">
                    <div class="col-md-8">
                        <h2 class="display-4 fw-800 mb-1 text-dark" id="modalAnimalName">Boris</h2>
                        <p class="text-muted fs-5 mb-0" id="modalAnimalBreed">Siberian Husky</p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <a href="contact.php" class="btn btn-adopt btn-lg px-4 shadow-sm">Adopt Me Now</a>
                    </div>
                </div>
                
                <div class="row g-3 mb-5 text-center">
                    <div class="col-4 col-md-3">
                        <div class="animal-info-pill">
                            <i class="fas fa-paw"></i>
                            <p class="small text-muted mb-0 fw-bold">Type</p>
                            <span class="fw-800 d-block" id="modalAnimalType">Dog</span>
                        </div>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="animal-info-pill">
                            <i class="fas fa-venus-mars"></i>
                            <p class="small text-muted mb-0 fw-bold">Gender</p>
                            <span class="fw-800 d-block" id="modalAnimalGender">Male</span>
                        </div>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="animal-info-pill">
                            <i class="fas fa-birthday-cake"></i>
                            <p class="small text-muted mb-0 fw-bold">Born</p>
                            <span class="fw-800 d-block" id="modalAnimalBirth">Jan 2024</span>
                        </div>
                    </div>
                    <div class="col-4 col-md-3 d-none d-md-block">
                        <div class="animal-info-pill">
                            <i class="fas fa-shield-alt"></i>
                            <p class="small text-muted mb-0 fw-bold">ID Card</p>
                            <span class="fw-800 d-block">Verified</span>
                        </div>
                    </div>
                </div>

                <div class="mb-0">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-info-circle text-primary me-2"></i> About me</h5>
                    <p class="text-muted fs-5 mb-0" id="modalAnimalDesc" style="line-height: 1.8;">
                        Boris is a talkative and friendly Husky. He loves the cold and long walks...
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======= Responsibilities (Questions) ======= -->
<section class="stats-section py-5 position-relative" style="background: url('assets/images/back.jpg') center/cover no-repeat fixed;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(2, 6, 23, 0.96), rgba(139, 92, 246, 0.5)); opacity: 0.98; z-index: 1;"></div>
    <div class="container position-relative py-5" style="z-index: 2;">
        <div class="text-center mb-5 reveal">
            <h2 class="display-5 fw-bold text-white mb-4">Responsible Adoption</h2>
            <div class="value-line mx-auto" style="background: var(--white); opacity: 0.5;"></div>
            <p class="text-white opacity-75 mt-3 fs-5">Before inviting a new soul into your home, consider these essential points.</p>
        </div>
        <div class="row g-4 mt-2">
            <!-- Question Cards -->
            <div class="col-md-6 col-lg-4">
                <div class="pro-glass p-4 h-100 d-flex align-items-start gap-4 transition-all question-card reveal-1">
                    <div class="step-number mb-0 flex-shrink-0 shadow-sm" style="width: 45px; height: 45px; font-size: 1.2rem; background: var(--white); color: var(--primary-dark);">1</div>
                    <p class="text-white mb-0 mt-2 fw-medium fs-5">Am I ready for a long-term commitment?</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="pro-glass p-4 h-100 d-flex align-items-start gap-4 transition-all question-card reveal-2">
                    <div class="step-number mb-0 flex-shrink-0 shadow-sm" style="width: 45px; height: 45px; font-size: 1.2rem; background: var(--white); color: var(--primary-dark);">2</div>
                    <p class="text-white mb-0 mt-2 fw-medium fs-5">Am I aware of potential allergies in my household?</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="pro-glass p-4 h-100 d-flex align-items-start gap-4 transition-all question-card reveal-3">
                    <div class="step-number mb-0 flex-shrink-0 shadow-sm" style="width: 45px; height: 45px; font-size: 1.2rem; background: var(--white); color: var(--primary-dark);">3</div>
                    <p class="text-white mb-0 mt-2 fw-medium fs-5">Is my current living situation stable enough?</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="pro-glass p-4 h-100 d-flex align-items-start gap-4 transition-all question-card reveal-1">
                    <div class="step-number mb-0 flex-shrink-0 shadow-sm" style="width: 45px; height: 45px; font-size: 1.2rem; background: var(--white); color: var(--primary-dark);">4</div>
                    <p class="text-white mb-0 mt-2 fw-medium fs-5">Do I have enough time for exercise and care?</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="pro-glass p-4 h-100 d-flex align-items-start gap-4 transition-all question-card reveal-2">
                    <div class="step-number mb-0 flex-shrink-0 shadow-sm" style="width: 45px; height: 45px; font-size: 1.2rem; background: var(--white); color: var(--primary-dark);">5</div>
                    <p class="text-white mb-0 mt-2 fw-medium fs-5">Is there sufficient space for their needs?</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="pro-glass p-4 h-100 d-flex align-items-start gap-4 transition-all question-card reveal-3">
                    <div class="step-number mb-0 flex-shrink-0 shadow-sm" style="width: 45px; height: 45px; font-size: 1.2rem; background: var(--white); color: var(--primary-dark);">6</div>
                    <p class="text-white mb-0 mt-2 fw-medium fs-5">Can I afford pet food and medical care?</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Browse by Category ======= -->
<section class="py-5" style="background-color: #f1f5f9;">
    <div class="container py-5">
        <div class="text-center mb-5 reveal">
            <h2 class="display-5 fw-bold mb-3">Browse by Category</h2>
            <div class="value-line mx-auto"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="category-card position-relative overflow-hidden rounded-4 shadow reveal-1" style="height: 350px;">
                    <img src="assets/images/dog2.jpg" class="w-100 h-100 object-fit-cover transition-all" alt="Dogs">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 text-white" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                        <h3 class="fw-bold mb-1">Dogs</h3>
                        <p class="mb-3 opacity-75">Loyal companions for every home.</p>
                        <a href="animals.php?type=dog" class="btn btn-primary btn-sm rounded-pill px-4">Browse Dogs</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-card position-relative overflow-hidden rounded-4 shadow reveal-2" style="height: 350px;">
                    <img src="assets/images/cat2.jpg" class="w-100 h-100 object-fit-cover transition-all" alt="Cats">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 text-white" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                        <h3 class="fw-bold mb-1">Cats</h3>
                        <p class="mb-3 opacity-75">Independent souls, forever friends.</p>
                        <a href="animals.php?type=cat" class="btn btn-primary btn-sm rounded-pill px-4">Browse Cats</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-card position-relative overflow-hidden rounded-4 shadow reveal-3" style="height: 350px;">
                    <img src="assets/images/parrot1.jpg" class="w-100 h-100 object-fit-cover transition-all" alt="Birds">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 text-white" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                        <h3 class="fw-bold mb-1">Parrots</h3>
                        <p class="mb-3 opacity-75">Colorful voices and unique bonds.</p>
                        <a href="animals.php?type=parrot" class="btn btn-primary btn-sm rounded-pill px-4">Browse Birds</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ======= Partners ======= -->
<section class="values-section py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 pe-lg-5">
                <h2 class="display-4 fw-bold mb-4">Our Commitment</h2>
                <div class="value-line mb-4"></div>
                <p class="text-muted mb-4 fs-5" style="line-height: 1.8;">
                    At AdoptMe, we act as a bridge between animals in need and families looking for love. We partner with shelters that strictly adhere to animal welfare standards.
                </p>
                <div class="p-4 bg-light rounded-4 mb-5 border-start border-primary border-4">
                    <p class="text-muted mb-0 font-italic">"Adopting a pet won't change the world, but for that one animal, the world will change forever."</p>
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



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal functionality
        const modalEl = document.getElementById('animalDetailsModal');
        const modal = new bootstrap.Modal(modalEl);
        const btns = document.querySelectorAll('.view-details-btn');

        btns.forEach(btn => {
            btn.addEventListener('click', function() {
                const data = btn.dataset;
                document.getElementById('modalAnimalName').textContent = data.name;
                document.getElementById('modalAnimalBreed').textContent = data.breed;
                document.getElementById('modalAnimalType').textContent = data.type;
                document.getElementById('modalAnimalGender').textContent = data.gender;
                document.getElementById('modalAnimalBirth').textContent = data.birth;
                document.getElementById('modalAnimalDesc').textContent = data.desc;
                document.getElementById('modalAnimalImage').src = data.image;
                document.getElementById('modalAnimalStatus').textContent = data.status || 'Available';
                
                modal.show();
            });
        });

        // Scroll animation reveal
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal, .reveal-1, .reveal-2, .reveal-3').forEach(el => {
            // Only observe parent reveal containers or specific items
            if (el.classList.contains('reveal')) observer.observe(el);
        });
    });

    window.addEventListener('scroll', function() {
        let video = document.getElementById('bgVideo');
        if (!video) return;
        let value = window.scrollY;
        video.style.filter = `blur(${value * 0.03}px) brightness(${1 - value * 0.001})`;
    });
</script>

<?php include "../views/footer.php"; ?>