<?php
require_once "includes/auth.php";
require_once "../config/database.php";

$success = $error = "";

// ADD
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add') {
    $name = htmlspecialchars(trim($_POST['name']));
    $type = $_POST['type'];
    $description = htmlspecialchars(trim($_POST['description']));
    $image = 'placeholder.png';

    if (!empty($_FILES['image']['name'])) {
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array($ext, $allowed)) {
            $filename = uniqid('animal_') . '.' . $ext;
            if (move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/" . $filename)) {
                $image = $filename;
            }
        } else {
            $error = "Only JPG, PNG, WEBP allowed.";
        }
    }

    if (!$error) {
        $pdo->prepare("INSERT INTO animals (name, type, image, description) VALUES (?, ?, ?, ?)")
            ->execute([$name, $type, $image, $description]);
        $success = "✅ Animal added successfully!";
    }
}

// DELETE
if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM animals WHERE id = ?")->execute([$_GET['delete']]);
    header("Location: animals.php?deleted=1");
    exit;
}

if (isset($_GET['deleted']))
    $success = "✅ Animal deleted successfully!";

$animals = $pdo->query("
    SELECT a.*, 
           (SELECT COUNT(*) FROM adoptions ad WHERE ad.animal_id = a.id) > 0 as is_adopted
    FROM animals a ORDER BY a.id DESC
")->fetchAll();

include "../views/header.php";
?>

<div class="container py-5 mt-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🐾 Manage Animals</h2>
        <a href="index.php" class="btn btn-outline-secondary rounded-pill">← Dashboard</a>
    </div>

    <?php if ($success): ?>
        <div class="alert alert-success rounded-4 border-0 shadow-sm"><?= $success ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert alert-danger rounded-4 border-0 shadow-sm"><?= $error ?></div>
    <?php endif; ?>

    <!-- Add Form -->
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
        <h5 class="fw-bold mb-4">➕ Add New Animal</h5>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-bold small">Name *</label>
                    <input type="text" name="name" class="form-control rounded-3" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold small">Type *</label>
                    <select name="type" class="form-select rounded-3" required>
                        <option value="">Choose...</option>
                        <option value="Dog">🐶 Dog</option>
                        <option value="Cat">🐱 Cat</option>
                        <option value="Bird">🦜 Bird</option>
                        <option value="Other">🐾 Other</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold small">Photo * (upload obligatoire)</label>
                    <input type="file" name="image" class="form-control rounded-3" accept="image/*" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold small">Description</label>
                    <input type="text" name="description" class="form-control rounded-3">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn text-white px-5 rounded-pill fw-bold"
                        style="background: linear-gradient(135deg, #667eea, #764ba2);">
                        <i class="fas fa-plus me-2"></i>Add Animal
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h5 class="fw-bold mb-4">📋 All Animals (<?= count($animals) ?>)</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($animals as $a): ?>
                        <tr>
                            <td class="text-muted">#<?= $a['id'] ?></td>
                            <td>
                                <img src="../assets/images/<?= htmlspecialchars($a['image']) ?>"
                                    style="width:50px;height:50px;object-fit:cover;border-radius:10px;border:2px solid #e2e8f0;">
                            </td>
                            <td class="fw-bold"><?= htmlspecialchars($a['name']) ?></td>
                            <td>
                                <span class="badge rounded-pill px-3"
                                    style="background:linear-gradient(135deg,#667eea,#764ba2);">
                                    <?= $a['type'] ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($a['is_adopted']): ?>
                                    <span class="badge bg-secondary rounded-pill">✓ Adopted</span>
                                <?php else: ?>
                                    <span class="badge bg-success rounded-pill">Available</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted small">
                                <?= htmlspecialchars(substr($a['description'] ?? '', 0, 40)) ?>...
                            </td>
                            <td>
                                <a href="animals.php?delete=<?= $a['id'] ?>"
                                    class="btn btn-sm btn-outline-danger rounded-pill"
                                    onclick="return confirm('Delete <?= htmlspecialchars($a['name']) ?>?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "../views/footer.php"; ?>