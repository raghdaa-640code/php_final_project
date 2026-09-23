<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit();
}

$host = 'localhost';
$db   = 'baddal';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$report_id = $id;
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("DELETE FROM reports WHERE id = ? AND user_id = ?");
$stmt->execute([$report_id, $user_id]);

header("Location: /show");
exit();
?>