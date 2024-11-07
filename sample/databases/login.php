<?php
// sample/databases/login.php
include 'config.php';

session_start(); // Start the session for login state

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $pdo->prepare("SELECT u.user_id, u.fullname, u.username, u.password FROM users u WHERE u.username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname'];
        header("Location: ../../dashboard.php");
      exit;

    } else {
        echo "Invalid username or password.";
    }
}
?>
