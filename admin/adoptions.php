<?php
require_once "includes/auth.php";
require_once "../config/database.php";

$adoptions = $pdo->query("
    SELECT af.*, 
           u.name as user_name, u.email,
           a.name as animal_name, a.type, a.image
    FROM adoption_forms af
    JOIN users u ON af.user_id = u.id
    JOIN animals a ON af.animal_id = a.id
    ORDER BY af.submitted_at DESC
")->fetchAll();

include "../views/header.php";
?>

<div class="container py-5 mt-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📋 Adoption Applications</h2>
        <a href="index.php" class="btn btn-outline-secondary rounded-pill">← Dashboard</a>
    </div>

    <?php if (empty($adoptions)): ?>
        <div class="card border-0 shadow-sm rounded-4 p-5 text-center">
            <div style="font-size:3rem;">📭</div>
            <h5 class="fw-bold mt-3">No applications yet</h5>
            <p class="text-muted">Adoption forms will appear here once submitted.</p>
        </div>
    <?php else: ?>
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <h5 class="fw-bold mb-4">All Applications (<?= count($adoptions) ?>)</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Animal</th>
                            <th>Applicant</th>
                            <th>Age</th>
                            <th>City</th>
                            <th>Housing</th>
                            <th>Children</th>
                            <th>Garden</th>
                            <th>Hours Home</th>
                            <th>Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($adoptions as $f): ?>
                            <tr>
                                <td class="text-muted">#<?= $f['id'] ?></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="../assets/images/<?= htmlspecialchars($f['image']) ?>"
                                            style="width:40px;height:40px;object-fit:cover;border-radius:8px;">
                                        <div>
                                            <div class="fw-bold small"><?= htmlspecialchars($f['animal_name']) ?></div>
                                            <small class="text-muted"><?= $f['type'] ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold small"><?= htmlspecialchars($f['full_name']) ?></div>
                                    <small class="text-muted"><?= htmlspecialchars($f['email']) ?></small>
                                </td>
                                <td><?= $f['age'] ?></td>
                                <td><?= htmlspecialchars($f['city']) ?></td>
                                <td>
                                    <span class="badge bg-light text-dark rounded-pill small">
                                        <?= str_replace('_', ' ', $f['housing_type']) ?>
                                    </span>
                                </td>
                                <td><?= $f['has_children'] ? '<span class="badge bg-info rounded-pill">Yes</span>' : '<span class="badge bg-light text-dark rounded-pill">No</span>' ?>
                                </td>
                                <td><?= $f['has_garden'] ? '<span class="badge bg-success rounded-pill">Yes</span>' : '<span class="badge bg-light text-dark rounded-pill">No</span>' ?>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark rounded-pill small">
                                        <?= str_replace(['less_4h', '4_8h', 'more_8h'], ['< 4h', '4-8h', '> 8h'], $f['hours_at_home']) ?>
                                    </span>
                                </td>
                                <td class="text-muted small"><?= date('M d, Y', strtotime($f['submitted_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include "../views/footer.php"; ?>