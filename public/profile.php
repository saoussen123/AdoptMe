<?php
require_once "../config/database.php";
require_once "../models/User.php";
include "../views/header.php";

// Redirect if not logged in
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION["user"];
$adoptions = User::getAdoptions($pdo, $user["id"]);
?>

<div class="container py-5">
    <div class="row">
        <!-- Sidebar: User Info -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-user-circle fa-5x text-primary"></i>
                    </div>
                    <h3 class="fw-bold"><?= htmlspecialchars($user["name"]) ?></h3>
                    <p class="text-muted"><?= htmlspecialchars($user["email"]) ?></p>
                    <hr>
                    <p class="small text-secondary">Joined on: <?= date("M d, Y", strtotime($user["created_at"])) ?></p>
                    <a href="logout.php" class="btn btn-outline-danger w-100 mt-3">Logout</a>
                </div>
            </div>
        </div>

        <!-- Main Content: Adoptions -->
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="mb-4 d-flex align-items-center">
                        <i class="fas fa-paw text-primary me-2"></i> My Adopted Pets
                    </h4>

                    <?php if (empty($adoptions)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-heart-broken fa-3x text-light mb-3"></i>
                            <p class="text-muted">You haven't adopted any pets yet.</p>
                            <a href="animals.php" class="btn btn-primary mt-2">Find your first friend</a>
                        </div>
                    <?php else: ?>
                        <div class="list-group list-group-flush">
                            <?php foreach ($adoptions as $pet): ?>
                                <div class="list-group-item px-0 py-3 border-bottom d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="../assets/images/<?= htmlspecialchars($pet['image']) ?>" 
                                             class="rounded-circle object-fit-cover shadow-sm" 
                                             style="width: 70px; height: 70px;"
                                             alt="<?= htmlspecialchars($pet['name']) ?>">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1 fw-bold"><?= htmlspecialchars($pet['name']) ?></h5>
                                        <p class="mb-0 text-muted small"><?= htmlspecialchars($pet['type']) ?></p>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-success-subtle text-success border border-success px-3 py-2 rounded-pill">
                                            Adopted on <?= date("M d, Y", strtotime($pet['adoption_date'])) ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../views/footer.php"; ?>
