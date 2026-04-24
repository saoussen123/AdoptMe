<?php
session_start();
require_once "../config/database.php";
require_once "../models/User.php";

header('Content-Type: application/json');
$action = $_POST["action"] ?? "";

if ($action == "login") {
    $user = User::findByEmail($pdo, $_POST["email"]);

    if ($user && password_verify($_POST["password"], $user["password"])) {
        session_regenerate_id(true); // Prevent session fixation
        $_SESSION["user"] = $user;
        echo json_encode(["status" => "success", "message" => "Logged in successfully"]);
    } else {
        http_response_code(401);
        echo json_encode(["status" => "error", "message" => "Invalid email or password"]);
    }
    exit;
}

if ($action == "register") {
    // Prevent registering multiple accounts with the same email
    $existingUser = User::findByEmail($pdo, $_POST["email"]);
    if ($existingUser) {
        http_response_code(409);
        echo json_encode(["status" => "error", "message" => "Email is already registered"]);
        exit;
    }

    if (User::create($pdo, $_POST["name"], $_POST["email"], $_POST["password"])) {
        echo json_encode(["status" => "success", "message" => "Account created successfully"]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to create account"]);
    }
    exit;
}

http_response_code(400);
echo json_encode(["status" => "error", "message" => "Invalid action"]);
exit;