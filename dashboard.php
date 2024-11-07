<?php
include 'sample/databases/config.php'; 

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT u.user_id, u.fullname, u.username, u.email, u.phone_number, p.profile_id
                       FROM users u
                       LEFT JOIN profiles p ON u.user_id = p.user_id");
$stmt->execute();
$users = $stmt->fetchAll();

if (!$users) {
    echo "No user data found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - All Users</title>
    <link rel="stylesheet" href="sample/dashboard.css">
</head>
<body>

<div class="dashboard-container">
    <h2>Dashboard</h2>

    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Profile ID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['user_id']); ?></td>
                    <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($user['profile_id']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><br>
    <a href="sample/databases/logout.php">Logout</a>
</div>

</body>
</html>
