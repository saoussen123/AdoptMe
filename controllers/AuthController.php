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
    try {
        // Prevent registering multiple accounts with the same email
        $existingUser = User::findByEmail($pdo, $_POST["email"]);
        if ($existingUser) {
            http_response_code(409);
            echo json_encode(["status" => "error", "message" => "Email is already registered"]);
            exit;
        }

        if (User::create($pdo, $_POST["name"], $_POST["email"], $_POST["password"], $_POST["phone"] ?? null)) {
            echo json_encode(["status" => "success", "message" => "Account created successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Failed to create account in database."]);
        }
    } catch (\Exception $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "DB Error: " . $e->getMessage()]);
    }
    exit;
}

if ($action == "forgot_password") {
    $email = trim($_POST["email"] ?? "");
    $user  = User::findByEmail($pdo, $email);

    if ($user) {
        // Generate a secure token valid for 1 hour
        $token   = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));
        User::saveResetToken($pdo, $email, $token, $expires);
        // In a real app you would send an email here with a link like:
        // https://yoursite.com/reset_password.php?token=$token
    }

    // Always return success to avoid leaking which emails are registered
    echo json_encode(["status" => "success", "message" => "If this email is registered, a reset link has been sent."]);
    exit;
}

if ($action == "reset_password") {
    $email       = trim($_POST["email"] ?? "");
    $newPassword = $_POST["new_password"] ?? "";

    if (empty($email) || strlen($newPassword) < 8) {
        http_response_code(422);
        echo json_encode(["status" => "error", "message" => "Invalid request. Password must be at least 8 characters."]);
        exit;
    }

    // Verify the user exists before updating
    $user = User::findByEmail($pdo, $email);
    if (!$user) {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "User not found."]);
        exit;
    }

    if (User::updatePassword($pdo, $email, $newPassword)) {
        echo json_encode(["status" => "success", "message" => "Password updated successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to update password. Please try again."]);
    }
    exit;
}

http_response_code(400);
echo json_encode(["status" => "error", "message" => "Invalid action"]);
exit;