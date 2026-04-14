<?php
require_once '../includes/db.php';
require_once '../includes/helpers.php';
require_once '../includes/crud.php';



$id = $_GET['id'] ?? null;
$all_destinations = [];
$grouped_destinations = [];

if (isset($id)) {
    $destination = getById("destinations", $id);
    $grouped_destinations[$destination['location']][] = $destination;
} else {
    $all_destinations = getAll("destinations");

    foreach ($all_destinations as $destination) {
        $grouped_destinations[$destination['location']][] = $destination;
    }
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
        .destination-section:nth-child(even) {
            background-color: var(--bg-alt);
        }
    </style>
    <title>Destinations | Leyte Tourism</title>
</head>
<body>
    <!-- NAV -->
    <?php include_once '../templates/navbar.php'; ?>
    
    <!-- HERO -->
     <section class="hero page-hero" style="background-image: url('../assets/images/hero.jpg');">
        <div class="container hero__content">
            <h1>Destinations</h1>
            <p>Explore the destinations in Leyte.</p>
        </div>
    </section>

    <!-- TOP DESTINATIONS -->
    <?php foreach($grouped_destinations as $location => $destinations): ?>
        <section class="destination-section">
            <div class="container">
                <div class="section-header">
                    <h2> <?= $location ?></h2>
                </div>

                <div class="grid-3">
                    <?php foreach($destinations as $destination): ?>
                        <article class="card">
                            <img src="<?= "../uploads/destinations/" . $destination['image_name'] ?>" alt=" <?= $destination['name'] ?> ">
                            <div class="card__content">
                                <span> <?= $destination['location'] ?></span>
                                <h3><?= $destination['name'] ?></h4>
                                <p><?= $destination['description'] ?></p>
                                <a href="?id=<?= $destination['id'] ?>">View</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <?php include_once '../templates/sub-footer.php' ?>
    <!-- JS -->
    <script src="../assets/js/main.js"></script>
</body>
</html>