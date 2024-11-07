<?php
// sample/databases/register.php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {
        // Begin a transaction
        $pdo->beginTransaction();

        // Insert user information
        $stmt = $pdo->prepare("INSERT INTO users (fullname, username, email, phone_number, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$fullname, $username, $email, $phone_number, $password]);

        // Get the last inserted user_id
        $user_id = $pdo->lastInsertId();

        // Insert into profiles table with the new user_id
        $profile_stmt = $pdo->prepare("INSERT INTO profiles (user_id) VALUES (?)");
        $profile_stmt->execute([$user_id]);

        // Commit the transaction
        $pdo->commit();

        // Redirect to login form after successful registration
        header("Location: ../../index.php"); // Redirect back to the login page
        exit;

    } catch (PDOException $e) {
        // Rollback in case of an error
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>
