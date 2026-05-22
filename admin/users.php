<?php
require_once "includes/auth.php";
require_once "../config/database.php";

$success = "";

if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM users WHERE id = ? AND id != 1")->execute([$_GET['delete']]);
    header("Location: users.php?deleted=1");
    exit;
}

if (isset($_GET['deleted']))
    $success = "✅ User deleted successfully!";

$users = $pdo->query("
    SELECT u.*, COUNT(a.id) as adoption_count
    FROM users u
    LEFT JOIN adoptions a ON a.user_id = u.id
    GROUP BY u.id
    ORDER BY u.created_at DESC
")->fetchAll();

include "../views/header.php";
?>

<div class="container py-5 mt-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">👥 Manage Users</h2>
        <a href="index.php" class="btn btn-outline-secondary rounded-pill">← Dashboard</a>
    </div>

    <?php if ($success): ?>
        <div class="alert alert-success rounded-4 border-0"><?= $success ?></div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h5 class="fw-bold mb-4">All Clients (<?= count($users) ?>)</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Adoptions</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u): ?>
                        <tr>
                            <td class="text-muted">#<?= $u['id'] ?></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold flex-shrink-0"
                                        style="width:36px;height:36px;background:linear-gradient(135deg,#667eea,#764ba2);font-size:0.85rem;">
                                        <?= strtoupper(substr($u['name'], 0, 1)) ?>
                                    </div>
                                    <span class="fw-bold"><?= htmlspecialchars($u['name']) ?></span>
                                </div>
                            </td>
                            <td class="text-muted"><?= htmlspecialchars($u['email']) ?></td>
                            <td><?= htmlspecialchars($u['phone'] ?? '-') ?></td>
                            <td>
                                <span
                                    class="badge rounded-pill <?= $u['adoption_count'] > 0 ? 'bg-success' : 'bg-light text-dark' ?>">
                                    <?= $u['adoption_count'] ?> pet<?= $u['adoption_count'] != 1 ? 's' : '' ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($u['id'] == 1): ?>
                                    <span class="badge rounded-pill" style="background:#667eea;">👑 Admin</span>
                                <?php else: ?>
                                    <span class="badge bg-light text-dark rounded-pill">User</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted small"><?= date('M d, Y', strtotime($u['created_at'])) ?></td>
                            <td>
                                <?php if ($u['id'] != 1): ?>
                                    <a href="users.php?delete=<?= $u['id'] ?>"
                                        class="btn btn-sm btn-outline-danger rounded-pill"
                                        onclick="return confirm('Delete this user?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted small">—</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "../views/footer.php"; ?>