<?php 
require_once '../../includes/db.php';
require_once '../../includes/helpers.php';

$error = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "Both fields must be present.";
    } else {
        $admin = fetch(executeQuery("SELECT * FROM admins WHERE username = ?", [$username]), true);
        if ($admin && password_verify($password, $admin['password'])) {
            // SUCCESSFUL LOGIN
            $_SESSION['admin_logged_in'] = true;
            navigateTo("index.php");
        } else {
            $error = "Invalid username or password.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/variables.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/layout.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Login</title>
</head>
<body>
    <div class="login-page">
        <form method="POST" class="login-form">
            <div class="login-header">
                <h3>Admin Dashboard</h2>
                <p>Login to manage leyte tourism data</p>
            </div>
            <?php if ($error): ?>
                <p class="form-error"> <?= $error ?> </p>
            <?php endif; ?>

            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input required type="text" name="username" id="username" class="form-input">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input required type="password" name="password" id="password" class="form-input">
            </div>

            <div class="login-button__container">
                <button type="submit" class="btn btn-primary login-button">Login</button>
                <a href="../index.php" class="link">Back to Website</a>
            </div>
        </div>
    </div>
</body>
</html>