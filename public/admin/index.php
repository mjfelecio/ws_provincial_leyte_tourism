<?php 
require_once '../../includes/db.php';
require_once '../../includes/helpers.php';
require_once '../../includes/auth.php';
require_once '../../includes/crud.php';


$news = fetch(executeQuery("SELECT COUNT(*) as count from news"), true);
$destinations = fetch(executeQuery("SELECT COUNT(*) as count from destinations"), true);
$delicacies = fetch(executeQuery("SELECT COUNT(*) as count from delicacies"), true);

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
    <title>Admin Dashboard</title>
</head>
<body>
    <?php include_once '../../templates/admin-navbar.php' ?>

    <main>
        <div class="container">
                <div class="admin-header">
                    <h2>Admin Dashboard</h2>
                </div>


     <div class="feature-card-container">
        <article class="feature-card">
            <span> <?= $news['count'] ?> </span>
            <h4>News</h4>
        </article>

        <article class="feature-card">
            <span> <?= $destinations['count'] ?> </span>
            <h4>Destinations</h4>
        </article>

        <article class="feature-card">
            <span> <?= $delicacies['count'] ?> </span>
            <h4>Delicacies</h4>
        </article>
    </div>
    
            </div>
            </main>

    <script src="../../assets/js/main.js"></script>
</body>
</html>