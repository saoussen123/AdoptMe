<?php
require_once "../config/database.php";
require_once "../models/User.php";
include "../views/header.php";

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION["user"];
$adoptions = User::getAdoptions($pdo, $user["id"]);
$adoptionCount = count($adoptions);
$joinDate = date("M d, Y", strtotime($user["created_at"]));
$memberDays = (int) ((time() - strtotime($user["created_at"])) / 86400);
?>

<section style="background: var(--bg-main); min-height: 100vh; padding: 0 0 4rem;">

    <!-- Profile hero banner -->
    <div
        style="background: linear-gradient(135deg, #765ca4ff 0%, #b26fa1ff 100%); padding: 3rem 0 5rem; position: relative; overflow: hidden;">
        <div
            style="position: absolute; width: 400px; height: 400px; background: radial-gradient(circle, rgba(139,92,246,0.25) 0%, transparent 70%); top: -100px; right: 10%; pointer-events: none;">
        </div>
        <div
            style="position: absolute; width: 250px; height: 250px; background: radial-gradient(circle, rgba(16,185,129,0.15) 0%, transparent 70%); bottom: -50px; left: 5%; pointer-events: none;">
        </div>

        <div class="container" style="position: relative; z-index: 1;">
            <div class="d-flex align-items-center gap-4 flex-wrap">
                <!-- Avatar -->
                <div
                    style="width: 90px; height: 90px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); display: flex; align-items: center; justify-content: center; font-family: 'Outfit', sans-serif; font-size: 2rem; font-weight: 700; color: white; border: 3px solid rgba(255,255,255,0.15); flex-shrink: 0;">
                    <?= strtoupper(substr($user["name"], 0, 1)) ?>
                </div>
                <div>
                    <h2
                        style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #fff; letter-spacing: -0.02em; margin: 0 0 4px;">
                        <?= htmlspecialchars($user["name"]) ?>
                    </h2>
                    <p style="color: var(--text-muted); font-size: 14px; margin: 0;">
                        <?= htmlspecialchars($user["email"]) ?>
                    </p>
                </div>

                <!-- Logout on right -->
                <div class="ms-auto">
                    <a href="logout.php"
                        style="border: 1px solid rgba(255,255,255,0.4); color: #ffffff; background: rgba(255,255,255,0.15); border-radius: 10px; padding: 8px 20px; font-size: 13px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0,0,0,0.05);"
                        onmouseover="this.style.background='#ef4444'; this.style.borderColor='#ef4444'; this.style.color='#ffffff'; this.style.transform='translateY(-1px)';"
                        onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.borderColor='rgba(255,255,255,0.4)'; this.style.color='#ffffff'; this.style.transform='translateY(0)';">
                        Logout
                    </a>
                </div>
            </div>

            <!-- Stats row -->
            <div class="d-flex gap-3 mt-4 flex-wrap">
                <div
                    style="background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.2); border-radius: 12px; padding: 12px 20px; min-width: 120px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    <div
                        style="font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: #ffffff;">
                        <?= $adoptionCount ?>
                    </div>
                    <div style="font-size: 13px; color: rgba(255,255,255,0.9); font-weight: 500;">Pets adopted</div>
                </div>
                <div
                    style="background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.2); border-radius: 12px; padding: 12px 20px; min-width: 120px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    <div
                        style="font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: #ffffff;">
                        <?= $memberDays ?>
                    </div>
                    <div style="font-size: 13px; color: rgba(255,255,255,0.9); font-weight: 500;">Days as member</div>
                </div>
                <div
                    style="background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.2); border-radius: 12px; padding: 12px 20px; min-width: 120px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    <div style="font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: #ffffff;">
                        <?= $joinDate ?>
                    </div>
                    <div style="font-size: 13px; color: rgba(255,255,255,0.9); font-weight: 500;">Member since</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards pulled up over the banner -->
    <div class="container" style="margin-top: -2.5rem; position: relative; z-index: 2;">
        <div class="row g-4">

            <!-- Sidebar -->
            <div class="col-lg-3">

                <!-- Info card -->
                <div class="card border-0 reveal reveal-1"
                    style="border-radius: var(--radius); box-shadow: var(--shadow-md);">
                    <div class="card-body p-4">
                        <p
                            style="font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-muted); margin: 0 0 1rem;">
                            Account info</p>

                        <div style="display: flex; flex-direction: column; gap: 14px;">
                            <div>
                                <p style="font-size: 11px; color: var(--text-muted); margin: 0 0 2px;">Full name</p>
                                <p style="font-size: 14px; font-weight: 600; color: var(--text-main); margin: 0;">
                                    <?= htmlspecialchars($user["name"]) ?>
                                </p>
                            </div>
                            <div>
                                <p style="font-size: 11px; color: var(--text-muted); margin: 0 0 2px;">Email</p>
                                <p style="font-size: 13px; color: var(--text-main); margin: 0; word-break: break-all;">
                                    <?= htmlspecialchars($user["email"]) ?>
                                </p>
                            </div>
                            <?php if (!empty($user["phone"])): ?>
                                <div>
                                    <p style="font-size: 11px; color: var(--text-muted); margin: 0 0 2px;">Phone</p>
                                    <p style="font-size: 13px; color: var(--text-main); margin: 0;">
                                        <?= htmlspecialchars($user["phone"]) ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <div>
                                <p style="font-size: 11px; color: var(--text-muted); margin: 0 0 2px;">Member since</p>
                                <p style="font-size: 13px; color: var(--text-main); margin: 0;"><?= $joinDate ?></p>
                            </div>
                        </div>

                        <hr style="border-color: rgba(0,0,0,0.06); margin: 1.25rem 0;">

                        <!-- Adoption badge -->
                        <div
                            style="background: <?= $adoptionCount > 0 ? 'rgba(16,185,129,0.08)' : 'rgba(139,92,246,0.06)' ?>; border: 1px solid <?= $adoptionCount > 0 ? 'rgba(16,185,129,0.2)' : 'rgba(139,92,246,0.15)' ?>; border-radius: 10px; padding: 10px 14px; display: flex; align-items: center; gap: 10px;">
                            <span style="font-size: 18px;"><?= $adoptionCount > 0 ? '🏅' : '🐾' ?></span>
                            <div>
                                <p
                                    style="font-size: 12px; font-weight: 600; color: <?= $adoptionCount > 0 ? '#059669' : 'var(--primary)' ?>; margin: 0;">
                                    <?= $adoptionCount > 0 ? 'Adopter' : 'Explorer' ?>
                                </p>
                                <p style="font-size: 11px; color: var(--text-muted); margin: 0;">
                                    <?= $adoptionCount > 0 ? $adoptionCount . ' pet' . ($adoptionCount > 1 ? 's' : '') . ' adopted' : 'No adoptions yet' ?>
                                </p>
                            </div>
                        </div>

                        <a href="logout.php" class="btn w-100 mt-3"
                            style="border: 1px solid rgba(239,68,68,0.3); color: #ef4444; border-radius: 10px; font-size: 13px; font-weight: 600; padding: 9px; background: transparent; transition: var(--transition);"
                            onmouseover="this.style.background='rgba(239,68,68,0.06)'"
                            onmouseout="this.style.background='transparent'">
                            Logout
                        </a>
                    </div>
                </div>

            </div>

            <!-- Main content -->
            <div class="col-lg-9">
                <div class="card border-0 reveal reveal-2"
                    style="border-radius: var(--radius); box-shadow: var(--shadow-md);">
                    <div class="card-body p-4">

                        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                            <h5
                                style="font-family: 'Outfit', sans-serif; font-weight: 700; letter-spacing: -0.01em; margin: 0;">
                                <i class="fas fa-paw me-2" style="color: var(--primary);"></i> My Adopted Pets
                            </h5>
                            <?php if ($adoptionCount > 0): ?>
                                <span
                                    style="background: rgba(139,92,246,0.08); color: var(--primary); border: 1px solid rgba(139,92,246,0.2); border-radius: 99px; padding: 4px 14px; font-size: 13px; font-weight: 600;">
                                    <?= $adoptionCount ?> pet<?= $adoptionCount > 1 ? 's' : '' ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <?php if (empty($adoptions)): ?>
                            <!-- Empty state -->
                            <div class="text-center py-5">
                                <div
                                    style="width: 80px; height: 80px; background: rgba(139,92,246,0.08); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.25rem; font-size: 32px;">
                                    🐾</div>
                                <h5
                                    style="font-family: 'Outfit', sans-serif; font-weight: 600; color: var(--text-main); margin-bottom: 8px;">
                                    No pets adopted yet</h5>
                                <p class="text-muted mb-4" style="font-size: 14px; max-width: 300px; margin-inline: auto;">
                                    Browse our animals and find your perfect furry companion waiting for a home.</p>
                                <a href="animals.php" class="btn btn-adopt" style="font-size: 14px; padding: 10px 28px;">
                                    Find your first friend
                                </a>
                            </div>

                        <?php else: ?>
                            <!-- Adoption list -->
                            <div style="display: flex; flex-direction: column; gap: 12px;">
                                <?php foreach ($adoptions as $index => $pet): ?>
                                    <div class="reveal"
                                        style="animation-delay: <?= 0.1 * ($index + 1) ?>s; background: var(--bg-main); border: 1px solid rgba(0,0,0,0.05); border-radius: 14px; padding: 16px; display: flex; align-items: center; gap: 16px; transition: var(--transition);"
                                        onmouseover="this.style.borderColor='rgba(139,92,246,0.25)';this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 25px rgba(139,92,246,0.1)'"
                                        onmouseout="this.style.borderColor='rgba(0,0,0,0.05)';this.style.transform='translateY(0)';this.style.boxShadow='none'">

                                        <!-- Pet image -->
                                        <img src="../assets/images/<?= htmlspecialchars($pet['image']) ?>"
                                            alt="<?= htmlspecialchars($pet['name']) ?>"
                                            style="width: 64px; height: 64px; border-radius: 12px; object-fit: cover; flex-shrink: 0; border: 2px solid rgba(139,92,246,0.15);">

                                        <!-- Pet info -->
                                        <div style="flex: 1; min-width: 0;">
                                            <h6
                                                style="font-family: 'Outfit', sans-serif; font-weight: 700; color: var(--text-main); margin: 0 0 3px; font-size: 15px;">
                                                <?= htmlspecialchars($pet['name']) ?>
                                            </h6>
                                            <p style="font-size: 13px; color: var(--text-muted); margin: 0;">
                                                <?= htmlspecialchars($pet['type']) ?>
                                            </p>
                                        </div>

                                        <!-- Adoption date badge -->
                                        <div style="flex-shrink: 0; text-align: right;">
                                            <span
                                                style="background: rgba(16,185,129,0.08); color: #059669; border: 1px solid rgba(16,185,129,0.2); border-radius: 99px; padding: 5px 14px; font-size: 12px; font-weight: 600; white-space: nowrap;">
                                                ✓ Adopted <?= date("M d, Y", strtotime($pet['adoption_date'])) ?>
                                            </span>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Bottom CTA -->
                            <div
                                style="margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid rgba(0,0,0,0.05); text-align: center;">
                                <a href="animals.php"
                                    style="color: var(--primary); font-size: 13px; font-weight: 600; text-decoration: none;">
                                    + Adopt another pet
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include "../views/footer.php"; ?>