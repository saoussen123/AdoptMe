<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Adopt Me 🐾</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css?v=2.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">🐾 AdoptMe</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="animals.php">Animals</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

                    <?php if (isset($_SESSION["user"])): ?>

                        <?php if ($_SESSION["user"]["id"] == 1): ?>
                            <li class="nav-item ms-lg-2">
                                <a href="<?= strpos($_SERVER['PHP_SELF'], 'admin') !== false ? 'index.php' : '../admin/index.php' ?>"
                                    class="btn btn-sm btn-warning px-3 rounded-pill fw-bold">
                                    <i class="fas fa-cog me-1"></i> Admin
                                </a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item ms-lg-3">
                            <a class="nav-link fw-bold text-dark"
                                href="<?= strpos($_SERVER['PHP_SELF'], 'admin') !== false ? '../public/profile.php' : 'profile.php' ?>">
                                <i class="fas fa-user-circle me-1"></i>
                                <?= htmlspecialchars($_SESSION["user"]["name"]) ?>
                            </a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a href="<?= strpos($_SERVER['PHP_SELF'], 'admin') !== false ? '../public/logout.php' : 'logout.php' ?>"
                                class="btn btn-outline-danger btn-sm px-3 rounded-pill">Logout</a>
                        </li>

                    <?php else: ?>
                        <li class="nav-item ms-lg-3">
                            <a href="<?= strpos($_SERVER['PHP_SELF'], 'admin') !== false ? '../public/login.php' : 'login.php' ?>"
                                class="btn btn-outline-primary btn-sm px-4 rounded-pill">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>
    <main>