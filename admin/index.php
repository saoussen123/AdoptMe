<?php
require_once "includes/auth.php";
require_once "../config/database.php";

$totalAnimals = $pdo->query("SELECT COUNT(*) FROM animals")->fetchColumn();
$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$totalAdoptions = $pdo->query("SELECT COUNT(*) FROM adoptions")->fetchColumn();
$availableAnimals = $pdo->query("SELECT COUNT(*) FROM animals WHERE available = 1")->fetchColumn();
$totalForms = $pdo->query("SELECT COUNT(*) FROM adoption_forms")->fetchColumn();

$recentAdoptions = $pdo->query("
    SELECT u.name as user_name, a.name as animal_name, a.type, a.image, ad.adoption_date
    FROM adoptions ad
    JOIN users u ON ad.user_id = u.id
    JOIN animals a ON ad.animal_id = a.id
    ORDER BY ad.adoption_date DESC
    LIMIT 5
")->fetchAll();

include "../views/header.php";
?>

<div class="container-fluid py-4 px-4 mt-3">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold mb-1">🛠️ Admin Dashboard</h2>
            <p class="text-muted mb-0">Welcome back, <?= htmlspecialchars($_SESSION['user']['name']) ?> 👋</p>
        </div>
        <a href="../public/index.php" class="btn btn-outline-secondary rounded-pill">
            <i class="fas fa-arrow-left me-2"></i>Back to Site
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-white h-100"
                style="background: linear-gradient(135deg, #667eea, #764ba2);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 opacity-75 small fw-bold text-uppercase">Total Animals</p>
                        <h2 class="fw-bold mb-0"><?= $totalAnimals ?></h2>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:55px; height:55px; background:rgba(255,255,255,0.2);">
                        <i class="fas fa-paw fa-lg"></i>
                    </div>
                </div>
                <p class="mt-3 mb-0 opacity-75 small">
                    <span class="text-white fw-bold"><?= $availableAnimals ?></span> available
                </p>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-white h-100"
                style="background: linear-gradient(135deg, #10b981, #059669);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 opacity-75 small fw-bold text-uppercase">Adoptions</p>
                        <h2 class="fw-bold mb-0"><?= $totalAdoptions ?></h2>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:55px; height:55px; background:rgba(255,255,255,0.2);">
                        <i class="fas fa-heart fa-lg"></i>
                    </div>
                </div>
                <p class="mt-3 mb-0 opacity-75 small">
                    <span class="text-white fw-bold"><?= $totalForms ?></span> applications
                </p>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-white h-100"
                style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 opacity-75 small fw-bold text-uppercase">Users</p>
                        <h2 class="fw-bold mb-0"><?= $totalUsers ?></h2>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:55px; height:55px; background:rgba(255,255,255,0.2);">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                </div>
                <p class="mt-3 mb-0 opacity-75 small">Registered clients</p>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-white h-100"
                style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 opacity-75 small fw-bold text-uppercase">Available</p>
                        <h2 class="fw-bold mb-0"><?= $availableAnimals ?></h2>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:55px; height:55px; background:rgba(255,255,255,0.2);">
                        <i class="fas fa-dog fa-lg"></i>
                    </div>
                </div>
                <p class="mt-3 mb-0 opacity-75 small">Waiting for adoption</p>
            </div>
        </div>
    </div>

    <!-- Nav Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <a href="animals.php" class="card border-0 shadow-sm rounded-4 p-4 text-decoration-none h-100"
                style="background:#f8f5ff; transition: transform 0.2s;"
                onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:55px; height:55px; background:linear-gradient(135deg,#667eea,#764ba2);">
                        <i class="fas fa-paw text-white fa-lg"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-1">Manage Animals</h5>
                        <p class="text-muted small mb-0">Add, upload photo, delete</p>
                    </div>
                    <i class="fas fa-chevron-right text-muted ms-auto"></i>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="users.php" class="card border-0 shadow-sm rounded-4 p-4 text-decoration-none h-100"
                style="background:#f8f5ff; transition: transform 0.2s;"
                onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:55px; height:55px; background:linear-gradient(135deg,#f59e0b,#d97706);">
                        <i class="fas fa-users text-white fa-lg"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-1">Manage Users</h5>
                        <p class="text-muted small mb-0">View and manage clients</p>
                    </div>
                    <i class="fas fa-chevron-right text-muted ms-auto"></i>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="adoptions.php" class="card border-0 shadow-sm rounded-4 p-4 text-decoration-none h-100"
                style="background:#f8f5ff; transition: transform 0.2s;"
                onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:55px; height:55px; background:linear-gradient(135deg,#10b981,#059669);">
                        <i class="fas fa-clipboard-list text-white fa-lg"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-1">Manage Adoptions</h5>
                        <p class="text-muted small mb-0">View all requests</p>
                    </div>
                    <i class="fas fa-chevron-right text-muted ms-auto"></i>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Adoptions -->
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h5 class="fw-bold mb-4"><i class="fas fa-clock me-2 text-primary"></i>Recent Adoptions</h5>
        <?php if (empty($recentAdoptions)): ?>
            <p class="text-muted text-center py-3">No adoptions yet.</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Animal</th>
                            <th>Adopted By</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recentAdoptions as $r): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="../assets/images/<?= htmlspecialchars($r['image']) ?>"
                                            style="width:40px;height:40px;object-fit:cover;border-radius:8px;">
                                        <div>
                                            <div class="fw-bold"><?= htmlspecialchars($r['animal_name']) ?></div>
                                            <small class="text-muted"><?= $r['type'] ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($r['user_name']) ?></td>
                                <td class="text-muted small"><?= date('M d, Y', strtotime($r['adoption_date'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php include "../views/footer.php"; ?>