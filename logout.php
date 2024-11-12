<?php
session_start();
include('database/db.php');

// Get current user ID and session ID
$user_id = $_SESSION['user_id'];
$session_id = session_id();

// Delete session and cookie from the database
$stmt = $conn->prepare("DELETE FROM user_sessions WHERE user_id = ? AND session_id = ?");
$stmt->bind_param("is", $user_id, $session_id);
$stmt->execute();

// Destroy the session
session_destroy();

// Delete the cookie
setcookie('session_cookie', '', time() - 3600, "/"); // Delete cookie
header("Location: login.php");
exit();