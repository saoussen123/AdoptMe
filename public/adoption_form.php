<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Si non connecté, rediriger vers login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

require_once "../config/database.php";
require_once "../models/Animal.php";

$animalId = $_GET['animal_id'] ?? null;
if (!$animalId) {
    header("Location: animals.php");
    exit;
}

// Vérifier si l'animal existe et s'il est déjà adopté
$stmt = $pdo->prepare("SELECT * FROM animals WHERE id = ?");
$stmt->execute([$animalId]);
$animal = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$animal) {
    header("Location: animals.php");
    exit;
}

// Vérifier si l'utilisateur a déjà soumis un formulaire pour cet animal
$userId = $_SESSION["user"]["id"];
$stmt = $pdo->prepare("SELECT id FROM adoption_forms WHERE user_id = ? AND animal_id = ?");
$stmt->execute([$userId, $animalId]);
if ($stmt->fetch()) {
    $error_msg = "You have already submitted an adoption form for this animal.";
}

// Vérifier s'il est déjà adopté globalement
$stmt = $pdo->prepare("SELECT id FROM adoptions WHERE animal_id = ?");
$stmt->execute([$animalId]);
if ($stmt->fetch()) {
    $error_msg = "This animal has already been adopted.";
}

$userName = $_SESSION['user']['name'] ?? '';
$userPhone = $_SESSION['user']['phone'] ?? '';

include "../views/header.php";
?>

<div class="container py-5 mt-3">
    <div class="row g-5">
        <!-- Sidebar with Animal Profile -->
        <div class="col-lg-4 d-none d-lg-block">
            <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 100px; background: #f8f5ff;">
                <div class="position-relative" style="height: 320px; overflow: hidden; border-radius: 1rem 1rem 0 0;">
                    <img src="../assets/images/<?= htmlspecialchars($animal['image'] ?? 'dog1.jpg') ?>" alt="<?= htmlspecialchars($animal['name']) ?>" class="w-100 h-100 object-fit-cover">
                    <span class="badge position-absolute top-0 end-0 m-3 px-3 py-2 shadow-sm" style="background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 8px; font-size: 0.85rem;">
                        <i class="fas fa-paw me-1"></i> <?= strtoupper(htmlspecialchars($animal['type'] ?? 'PET')) ?>
                    </span>
                </div>
                <div class="card-body p-4 text-center">
                    <h3 class="fw-bold mb-1" style="color: #2d3748;"><?= htmlspecialchars($animal['name']) ?></h3>
                    <p class="text-muted fw-semibold mb-4"><?= htmlspecialchars($animal['breed'] ?? 'Mixed Breed') ?></p>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <div class="p-3 rounded-4 bg-white shadow-sm border border-light transition-all hover-lift">
                                <i class="fas fa-venus-mars fs-4 mb-2" style="color: #667eea;"></i>
                                <div class="small fw-bold text-muted text-uppercase" style="letter-spacing: 1px; font-size: 0.7rem;">Gender</div>
                                <div class="fw-bold" style="color: #4a5568;"><?= htmlspecialchars($animal['gender'] ?? 'Unknown') ?></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 rounded-4 bg-white shadow-sm border border-light transition-all hover-lift">
                                <i class="fas fa-birthday-cake fs-4 mb-2" style="color: #764ba2;"></i>
                                <div class="small fw-bold text-muted text-uppercase" style="letter-spacing: 1px; font-size: 0.7rem;">Age/Birth</div>
                                <div class="fw-bold" style="color: #4a5568;"><?= htmlspecialchars($animal['birth_date'] ?? 'Adult') ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-white rounded-4 shadow-sm text-start border-start border-4" style="border-color: #667eea !important;">
                        <p class="small text-muted mb-0 fst-italic" style="line-height: 1.6;">"<?= htmlspecialchars($animal['description'] ?? 'Looking for a loving forever home.') ?>"</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Adoption Form -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header border-0 text-white p-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 shadow" style="width: 60px; height: 60px;">
                            <i class="fas fa-clipboard-check fs-3" style="background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-1">Adoption Application</h2>
                            <p class="mb-0 text-white-50 fs-5">You're one step closer to bringing <?= htmlspecialchars($animal['name']) ?> home.</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5 bg-white">
                    <?php if (isset($error_msg)): ?>
                        <div class="alert alert-danger p-4 rounded-4 shadow-sm text-center fw-bold d-flex align-items-center justify-content-center gap-3">
                            <i class="fas fa-exclamation-triangle fs-3"></i> 
                            <div>
                                <div class="fs-5 mb-1"><?= $error_msg ?></div>
                                <a href="animals.php" class="btn btn-sm btn-outline-danger mt-2 rounded-pill px-4">Browse Other Pets</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <form id="adoptionForm" novalidate class="needs-validation">
                            <input type="hidden" name="animal_id" value="<?= htmlspecialchars($animalId) ?>">

                            <!-- ── Section 1: Personal Info ── -->
                            <div class="form-section mb-5 position-relative">
                                <div class="d-flex align-items-center mb-4 gap-3">
                                    <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 35px; height: 35px; background: #667eea;">1</div>
                                    <h5 class="fw-bold mb-0 text-dark">Personal Information</h5>
                                </div>
                                <div class="row g-4 ms-2 ms-md-4 pl-md-2 border-start border-2 pb-4" style="border-color: #e2e8f0 !important;">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control rounded-3 bg-light border-0" id="fullName" name="full_name" value="<?= htmlspecialchars($userName) ?>" placeholder="Full Name" required>
                                            <label for="fullName" class="text-muted"><i class="fas fa-user me-2"></i>Full Name *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control rounded-3 bg-light border-0" id="phone" name="phone" value="<?= htmlspecialchars($userPhone) ?>" placeholder="Phone" required>
                                            <label for="phone" class="text-muted"><i class="fas fa-phone me-2"></i>Phone Number *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="number" class="form-control rounded-3 bg-light border-0" id="age" name="age" placeholder="Age" min="18" max="99" required>
                                            <label for="age" class="text-muted"><i class="fas fa-calendar me-2"></i>Age (18+) *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control rounded-3 bg-light border-0" id="city" name="city" placeholder="City" required>
                                            <label for="city" class="text-muted"><i class="fas fa-map-marker-alt me-2"></i>City of Residence *</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ── Section 2: Living Situation ── -->
                            <div class="form-section mb-5 position-relative">
                                <div class="d-flex align-items-center mb-4 gap-3">
                                    <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 35px; height: 35px; background: #667eea;">2</div>
                                    <h5 class="fw-bold mb-0 text-dark">Living Environment</h5>
                                </div>
                                <div class="row g-4 ms-2 ms-md-4 pl-md-2 border-start border-2 pb-4" style="border-color: #e2e8f0 !important;">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small text-uppercase">Housing Type *</label>
                                        <select class="form-select form-select-lg rounded-3 bg-light border-0 fs-6" name="housing_type" required>
                                            <option value="">Choose...</option>
                                            <option value="apartment">Apartment</option>
                                            <option value="house_with_garden">House with garden</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small text-uppercase">Has Garden? *</label>
                                        <select class="form-select form-select-lg rounded-3 bg-light border-0 fs-6" name="has_garden" required>
                                            <option value="">Choose...</option>
                                            <option value="1">Yes, fully fenced</option>
                                            <option value="0">No garden</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small text-uppercase">Living alone? *</label>
                                        <select class="form-select form-select-lg rounded-3 bg-light border-0 fs-6" name="lives_alone" required>
                                            <option value="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No, I live with others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small text-uppercase">Have Children? *</label>
                                        <select class="form-select form-select-lg rounded-3 bg-light border-0 fs-6" id="modal_has_children" name="has_children" required onchange="document.getElementById('children_ages_field').style.display = this.value == '1' ? 'block' : 'none';">
                                            <option value="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-3" id="children_ages_field" style="display:none;">
                                        <div class="form-floating">
                                            <input type="text" class="form-control rounded-3 bg-light border-0" id="childrenAges" name="children_ages" placeholder="Ages">
                                            <label for="childrenAges" class="text-muted">Children's ages (e.g. 5, 8, 12)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ── Section 3: Experience ── -->
                            <div class="form-section mb-5 position-relative">
                                <div class="d-flex align-items-center mb-4 gap-3">
                                    <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 35px; height: 35px; background: #667eea;">3</div>
                                    <h5 class="fw-bold mb-0 text-dark">Pet Experience</h5>
                                </div>
                                <div class="row g-4 ms-2 ms-md-4 pl-md-2 border-start border-2 pb-4" style="border-color: #e2e8f0 !important;">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small text-uppercase">Previous pet owner? *</label>
                                        <select class="form-select form-select-lg rounded-3 bg-light border-0 fs-6" name="had_pet_before" required>
                                            <option value="">Choose...</option>
                                            <option value="1">Yes, I'm experienced</option>
                                            <option value="0">No, this would be my first</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small text-uppercase">Current pets? *</label>
                                        <select class="form-select form-select-lg rounded-3 bg-light border-0 fs-6" id="modal_has_current_pets" name="has_current_pets" required onchange="document.getElementById('current_pets_field').style.display = this.value == '1' ? 'block' : 'none';">
                                            <option value="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-3" id="current_pets_field" style="display:none;">
                                        <div class="form-floating">
                                            <input type="text" class="form-control rounded-3 bg-light border-0" id="currentPetsDesc" name="current_pets_description" placeholder="Description">
                                            <label for="currentPetsDesc" class="text-muted">Describe your current pets (species, age, breed)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ── Section 4: Motivation & Final Details ── -->
                            <div class="form-section mb-4 position-relative">
                                <div class="d-flex align-items-center mb-4 gap-3">
                                    <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 35px; height: 35px; background: #667eea;">4</div>
                                    <h5 class="fw-bold mb-0 text-dark">Commitment</h5>
                                </div>
                                <div class="row g-4 ms-2 ms-md-4 pl-md-2 pb-2">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small text-uppercase">Hours left alone? *</label>
                                        <select class="form-select form-select-lg rounded-3 bg-light border-0 fs-6" name="hours_at_home" required>
                                            <option value="">Choose...</option>
                                            <option value="less_4h">Less than 4 hours</option>
                                            <option value="4_8h">4 to 8 hours</option>
                                            <option value="more_8h">More than 8 hours</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small text-uppercase">Any pet allergies? *</label>
                                        <select class="form-select form-select-lg rounded-3 bg-light border-0 fs-6" name="has_allergies" required>
                                            <option value="">Choose...</option>
                                            <option value="0">No allergies in household</option>
                                            <option value="1">Yes, someone has allergies</option>
                                        </select>
                                        <!-- Keep household_allergies as hidden to satisfy DB constraints without cluttering UI -->
                                        <input type="hidden" name="household_allergies" value="0">
                                    </div>
                                    <div class="col-12 mt-4">
                                        <label class="form-label fw-bold text-muted small text-uppercase mb-2">Why do you want to adopt <?= htmlspecialchars($animal['name']) ?>? *</label>
                                        <textarea class="form-control rounded-4 bg-light border-0 p-3" name="motivation" rows="5" placeholder="Tell us about yourself, your lifestyle, and why you would provide a great home..." required minlength="30"></textarea>
                                        <div class="form-text text-end text-muted mt-2"><i class="fas fa-info-circle me-1"></i> Minimum 30 characters</div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 bg-light rounded-4 mt-5 d-flex flex-column flex-md-row align-items-center justify-content-between border border-light shadow-sm">
                                <div class="mb-3 mb-md-0 d-flex align-items-center gap-3">
                                    <i class="fas fa-shield-alt fs-2 text-success opacity-75"></i>
                                    <p class="mb-0 small text-muted">By submitting, you agree to a background check and a possible home visit by our volunteers.</p>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="animals.php" class="btn btn-light fw-bold px-4 rounded-pill border">Cancel</a>
                                    <button type="button" class="btn fw-bold px-5 rounded-pill text-white shadow" id="submitAdoptBtn" onclick="submitAdoptionForm()" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        Submit <i class="fas fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../views/footer.php"; ?>
<script src="../assets/js/script.js"></script>
