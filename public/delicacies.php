<?php

require_once '../includes/db.php';
require_once '../includes/helpers.php';
require_once '../includes/crud.php';

$id = $_GET['id'] ?? null;
$delicacies = [];

if (isset($id)) {
    $delicacies[] = getById("delicacies", $id);
} else {
    $delicacies = getAll("delicacies");
    foreach ($delicacies as &$delicacy) {
        $delicacy['ingredients'] = sliceToPar($delicacy['ingredients']);
    }
    unset($delicacy);
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
    <title>Destinations | Leyte Tourism</title>
</head>
<body>
    <!-- NAV -->
    <?php include_once '../templates/navbar.php'; ?>
    
    <!-- HERO -->
     <section class="hero page-hero" style="background-image: url('../assets/images/delicacies/moron.png');">
        <div class="container hero__content">
            <h1>Delicacies</h1>
            <p>Taste the wonders of Leyte</p>
        </div>
    </section>

    <!-- TOP DESTINATIONS -->
    <section class="destination-section">
        <div class="container">
            <div class="section-header">
                <h2> All Delicacies </h2>
            </div>

            <div class="grid-3">
                <?php foreach($delicacies as $delicacy): ?>
                    <article class="card">
                        <img src="<?= "../uploads/delicacies/" . $delicacy['image_name'] ?>" alt=" <?= $delicacy['name'] ?> ">
                        <div class="card__content">
                            <span> <?= $delicacy['location'] ?></span>
                            <h3><?= $delicacy['name'] ?></h4>
                            <p><?= $delicacy['description'] ?></p>
                            <a href="?id=<?= $delicacy['id'] ?>">View</a>
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