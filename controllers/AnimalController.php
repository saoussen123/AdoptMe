<?php
session_start();
require_once "../config/database.php";
require_once "../models/Animal.php";

header('Content-Type: application/json');
$action = $_POST["action"] ?? "";

if ($action == "adopt") {
    // Check if user is logged in
    if (!isset($_SESSION["user"])) {
        http_response_code(401);
        echo json_encode(["status" => "not_logged_in", "message" => "Please login first."]);
        exit;
    }

    $userId = $_SESSION["user"]["id"];
    $animalId = $_POST["animal_id"];

    // Check if the animal is already adopted
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
        // Handle common integrity errors (e.g., stale session ID)
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