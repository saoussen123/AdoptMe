<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user']) || $_SESSION['user']['id'] != 1) {
    header("Location: ../public/login.php");
    exit;
}