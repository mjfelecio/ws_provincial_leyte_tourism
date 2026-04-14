<?php

require_once '../includes/db.php';
require_once '../includes/helpers.php';
require_once '../includes/crud.php';

$id = $_GET['id'] ?? null;
$festivals = [];

if (isset($id)) {
    $festivals[] = getById("festivals", $id);
} else {
    $festivals = getAll("festivals");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/layout.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <style>
        /*  */
    </style>
    <title>Festivals | Leyte Tourism</title>
</head>
<body>
    <!-- NAV -->
    <?php include_once '../templates/navbar.php'; ?>
    
    <!-- HERO -->
     <section class="hero page-hero" style="background-image: url('../assets/images/festivals/Buyogan%20Festival/CYve9VxUoAA7_ct.jpg');">
        <div class="container hero__content">
            <h1>Festivals</h1>
            <p>Celebrate the wonderful culture of Leyte.</p>
        </div>
    </section>

    <!-- TOP DESTINATIONS -->
    <section class="destination-section">
        <div class="container">
            <div class="section-header">
                <h2> All Festivals </h2>
            </div>

            <div class="grid-3">
                <?php foreach($festivals as $festival): ?>
                    <article class="card">
                        <img src="../assets/images/destinations/Alto Peak.jpg" alt="">
                        <div class="card__content">
                            <span><?= $festival['location'] ?></span>
                            <h3><?= $festival['name'] ?></h4>
                            <p><?= $festival['description'] ?></p>
                            <strong>History</strong>
                            <p><?= $festival['history'] ?></p>
                                <a href="?id=<?= $festival['id'] ?>">View</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include_once '../templates/sub-footer.php' ?>
    <!-- JS -->
    <script src="../assets/js/main.js"></script>
</body>
</html>