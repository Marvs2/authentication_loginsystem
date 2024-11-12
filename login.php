<?php
session_start();
include('database/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Create a session ID
        $session_id = session_id();

        // Set a cookie
        $cookie_value = bin2hex(random_bytes(16)); // Create a random cookie value
        setcookie('session_cookie', $cookie_value, time() + (86400 * 30), "/"); // 30 days

        // Store session and cookie in database
        $stmt = $conn->prepare("INSERT INTO user_sessions (user_id, session_id, cookie_value) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user['id'], $session_id, $cookie_value);
        $stmt->execute();

        header("Location: users/dashboard.php");
    } else {
        $_SESSION['message'] = "Invalid username or password!";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="username" required placeholder="Username">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit">Login</button>
    </form>
    <p><?php echo $_SESSION['message'] ?? ''; ?></p>
</body>
</html>