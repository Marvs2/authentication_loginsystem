<?php
session_start();
include('../../../database/db.php');


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if session and cookie exist in the database
$user_id = $_SESSION['user_id'];
$session_id = session_id();
$cookie_value = $_COOKIE['session_cookie'] ?? '';

$stmt = $conn->prepare("SELECT * FROM user_sessions WHERE user_id = ? AND session_id = ? AND cookie_value = ?");
$stmt->bind_param("iss", $user_id, $session_id, $cookie_value);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: ../logout.php");
    exit();
}

echo "Welcome, " . $_SESSION['username'] . "! <br>";
echo '<a href="logout.php">Logout</a>';