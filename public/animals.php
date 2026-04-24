<?php
include "../views/header.php";
require_once "../config/database.php";
require_once "../models/Animal.php";

$animals = Animal::getAll($pdo);
?>

<!-- Full Page Background Wrapper -->
<div class="fixed-top w-100 h-100" style="z-index: -1; background: url('https://images.unsplash.com/photo-1541781774459-bb2af2f05b55?auto=format&fit=crop&q=80&w=1500') center/cover no-repeat; filter: brightness(1.1); opacity: 0.5;"></div>

<div class="container py-5 text-center mt-5">
    <h1 class="display-3 fw-bold mb-2">Our Wonderful Pets</h1>
    <p class="fs-4 text-muted mb-5">Browse and find your soulmate among our furry friends.</p>
</div>

<div class="container py-4">

    <div class="row g-4">

        <?php foreach ($animals as $a): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 animal-card shadow-sm" style="background: var(--white);">
                    <!-- Image Container -->
                    <div class="d-flex align-items-center justify-content-center p-3" style="height: 280px; background: rgba(0,0,0,0.02);">
                        <img src="../assets/images/<?= htmlspecialchars($a['image']) ?>" 
                             class="rounded-3 shadow-sm transition-all" 
                             alt="<?= htmlspecialchars($a['name']) ?>" 
                             style="max-width: 100%; max-height: 100%; object-fit: contain;">
                        
                        <span class="badge position-absolute top-0 end-0 m-3 shadow-sm px-3 py-2 rounded-2" 
                              style="background: var(--primary); font-weight: 700; font-size: 0.7rem; z-index: 3;">
                            <?= strtoupper(htmlspecialchars($a['type'])) ?>
                        </span>
                    </div>

                    <div class="card-body p-4 d-flex flex-column text-center">
                        <h4 class="fw-bold mb-2" style="color: var(--text-main);"><?= htmlspecialchars($a['name']) ?></h4>
                        <p class="text-muted mb-4 small" style="line-height: 1.5;">
                            <?= htmlspecialchars($a['description'] ?? "A wonderful companion.") ?>
                        </p>
                        
                        <div class="mt-auto">
                            <?php if (!empty($a['is_adopted'])): ?>
                                <button class="btn btn-secondary w-100 rounded-3 py-2 fw-bold" disabled>
                                    <i class="fas fa-check-circle me-2"></i> Already Adopted
                                </button>
                            <?php else: ?>
                                <?php if(isset($_SESSION['user'])): ?>
                                    <button onclick="adopt(<?= $a['id'] ?>, this)" class="btn btn-adopt w-100 rounded-3 py-2 fw-bold">
                                        <i class="fas fa-heart me-2"></i> Adopt Me
                                    </button>
                                <?php else: ?>
                                    <a href="login.php" class="btn btn-outline-dark w-100 rounded-3 py-2 fw-bold small">
                                        <i class="fas fa-sign-in-alt me-2"></i> View Details
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>
</div>

<script src="../assets/js/script.js"></script>

<?php include "../views/footer.php"; ?>