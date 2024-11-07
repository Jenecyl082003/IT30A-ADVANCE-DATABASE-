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
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("INSERT INTO users (fullname, username, email, phone_number, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$fullname, $username, $email, $phone_number, $password]);

        $user_id = $pdo->lastInsertId();

        $profile_stmt = $pdo->prepare("INSERT INTO profiles (user_id) VALUES (?)");
        $profile_stmt->execute([$user_id]);

        $pdo->commit();

        header("Location: ../../index.php");
        exit;

    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>
