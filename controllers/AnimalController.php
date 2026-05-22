<?php
session_start();
require_once "../config/database.php";
require_once "../models/Animal.php";

header('Content-Type: application/json');
$action = $_POST["action"] ?? "";

// ─────────────────────────────────────────
// ACTION: Show adoption form check
// ─────────────────────────────────────────
if ($action == "check_adopt") {
    if (!isset($_SESSION["user"])) {
        echo json_encode(["status" => "not_logged_in"]);
        exit;
    }

    $animalId = $_POST["animal_id"];

    // Check if already adopted
    $stmt = $pdo->prepare("SELECT id FROM adoptions WHERE animal_id = ?");
    $stmt->execute([$animalId]);
    if ($stmt->fetch()) {
        echo json_encode(["status" => "error", "message" => "This animal has already been adopted! 🐾"]);
        exit;
    }

    // Check if user already submitted a form for this animal
    $userId = $_SESSION["user"]["id"];
    $stmt = $pdo->prepare("SELECT id FROM adoption_forms WHERE user_id = ? AND animal_id = ?");
    $stmt->execute([$userId, $animalId]);
    if ($stmt->fetch()) {
        echo json_encode(["status" => "error", "message" => "You already submitted a form for this animal! 🐾"]);
        exit;
    }

    // OK — tell JS to open the form modal
    echo json_encode(["status" => "show_form"]);
    exit;
}

// ─────────────────────────────────────────
// ACTION: Submit adoption form
// ─────────────────────────────────────────
if ($action == "submit_form") {
    if (!isset($_SESSION["user"])) {
        echo json_encode(["status" => "not_logged_in"]);
        exit;
    }

    $userId = $_SESSION["user"]["id"];
    $animalId = $_POST["animal_id"];

    // Validate required fields
    $required = [
        "full_name",
        "age",
        "city",
        "phone",
        "housing_type",
        "lives_alone",
        "has_children",
        "had_pet_before",
        "has_current_pets",
        "has_allergies",
        "household_allergies",
        "hours_at_home",
        "has_garden",
        "motivation"
    ];

    foreach ($required as $field) {
        if (!isset($_POST[$field]) || $_POST[$field] === "") {
            echo json_encode(["status" => "error", "message" => "Please fill in all required fields."]);
            exit;
        }
    }

    // Sanitize inputs
    $full_name = htmlspecialchars(trim($_POST["full_name"]));
    $age = (int) $_POST["age"];
    $city = htmlspecialchars(trim($_POST["city"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $housing = $_POST["housing_type"];
    $lives_alone = $_POST["lives_alone"] === "1" ? 1 : 0;
    $has_children = $_POST["has_children"] === "1" ? 1 : 0;
    $children_ages = htmlspecialchars(trim($_POST["children_ages"] ?? ""));
    $had_pet = $_POST["had_pet_before"] === "1" ? 1 : 0;
    $has_pets = $_POST["has_current_pets"] === "1" ? 1 : 0;
    $pets_desc = htmlspecialchars(trim($_POST["current_pets_description"] ?? ""));
    $allergies = $_POST["has_allergies"] === "1" ? 1 : 0;
    $hh_allergies = $_POST["household_allergies"] === "1" ? 1 : 0;
    $hours_home = $_POST["hours_at_home"];
    $has_garden = $_POST["has_garden"] === "1" ? 1 : 0;
    $motivation = htmlspecialchars(trim($_POST["motivation"]));

    // Validate age
    if ($age < 18 || $age > 99) {
        echo json_encode(["status" => "error", "message" => "You must be at least 18 years old to adopt. 🐾"]);
        exit;
    }

    try {
        // Save adoption form
        $stmt = $pdo->prepare("
            INSERT INTO adoption_forms 
            (user_id, animal_id, full_name, age, city, phone, housing_type,
             lives_alone, has_children, children_ages, had_pet_before,
             has_current_pets, current_pets_description, has_allergies,
             household_allergies, hours_at_home, has_garden, motivation)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $userId,
            $animalId,
            $full_name,
            $age,
            $city,
            $phone,
            $housing,
            $lives_alone,
            $has_children,
            $children_ages,
            $had_pet,
            $has_pets,
            $pets_desc,
            $allergies,
            $hh_allergies,
            $hours_home,
            $has_garden,
            $motivation
        ]);

        // Now register the adoption
        if (Animal::adopt($pdo, $userId, $animalId)) {
            echo json_encode(["status" => "success", "message" => "Adoption successful! 🐾"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Could not complete adoption."]);
        }

    } catch (PDOException $e) {
        if ($e->getCode() == '23000') {
            echo json_encode(["status" => "error", "message" => "This animal was just adopted by someone else! 🐾"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
        }
    }
    exit;
}

// ─────────────────────────────────────────
// ACTION: Direct adopt (fallback)
// ─────────────────────────────────────────
if ($action == "adopt") {
    if (!isset($_SESSION["user"])) {
        http_response_code(401);
        echo json_encode(["status" => "not_logged_in", "message" => "Please login first."]);
        exit;
    }

    $userId = $_SESSION["user"]["id"];
    $animalId = $_POST["animal_id"];

    $stmt = $pdo->prepare("SELECT id FROM adoptions WHERE animal_id = ?");
    $stmt->execute([$animalId]);
    if ($stmt->fetch()) {
        http_response_code(409);
        echo json_encode(["status" => "error", "message" => "This animal has already been adopted! 🐾"]);
        exit;
    }

    try {
        if (Animal::adopt($pdo, $userId, $animalId)) {
            echo json_encode(["status" => "success", "message" => "Animal adopted successfully."]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Could not adopt animal."]);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        if ($e->getCode() == '23000') {
            echo json_encode(["status" => "error", "message" => "Session expired or invalid user ID. Please logout and login again! 🐾"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Database Error: " . $e->getMessage()]);
        }
    }
    exit;
}

http_response_code(400);
echo json_encode(["status" => "error", "message" => "Invalid action"]);
exit;