<?php
require_once "../config/database.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? 'list';

// GET all animals
if ($method === 'GET' && $action === 'list') {
    $animals = $pdo->query("SELECT * FROM animals")->fetchAll();
    echo json_encode(["status" => "success", "data" => $animals]);
    exit;
}

// GET single animal
if ($method === 'GET' && $action === 'get') {
    $id = $_GET['id'] ?? null;
    $stmt = $pdo->prepare("SELECT * FROM animals WHERE id = ?");
    $stmt->execute([$id]);
    $animal = $stmt->fetch();
    if ($animal) {
        echo json_encode(["status" => "success", "data" => $animal]);
    } else {
        echo json_encode(["status" => "error", "message" => "Animal not found"]);
    }
    exit;
}

// GET stats
if ($method === 'GET' && $action === 'stats') {
    $stats = [
        "total_animals" => $pdo->query("SELECT COUNT(*) FROM animals")->fetchColumn(),
        "available" => $pdo->query("SELECT COUNT(*) FROM animals WHERE available = 1")->fetchColumn(),
        "adopted" => $pdo->query("SELECT COUNT(*) FROM adoptions")->fetchColumn(),
        "total_users" => $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
        "total_forms" => $pdo->query("SELECT COUNT(*) FROM adoption_forms")->fetchColumn(),
    ];
    echo json_encode(["status" => "success", "data" => $stats]);
    exit;
}

echo json_encode(["status" => "error", "message" => "Invalid action"]);