<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Register</title>
    <link rel="stylesheet" href="sample/styles.css">
</head>
<body>

<div class="container">
    <div id="login-form">
        <h2>Login</h2>
        <form action="sample/databases/login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p><a href="javascript:void(0);" onclick="toggleForms()">Register if you don't have an account</a></p>
    </div>


    <div id="register-form" style="display: none;">
        <h2>Register</h2>
        <form action="sample/databases/register.php" method="post">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone_number" placeholder="Phone Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p><a href="javascript:void(0);" onclick="toggleForms()">Already have an account? Login</a></p>
    </div>
</div>

<script src="sample/scripts.js"></script>

</body>
</html>
