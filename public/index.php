<?php
require_once '../includes/db.php';
require_once '../includes/helpers.php';
require_once '../includes/crud.php';

$featured_destinations = fetch(executeQuery("select * from destinations where is_featured = 1"));
$featured_delicacy = fetch(executeQuery("select * from delicacies where is_featured = 1"), 1);
$featured_festivals = fetch(executeQuery("select * from festivals where is_featured = 1"));
$latest_news = array_slice(getAll('news', "updated_at", 'DESC'), 0, 3);


$resources = ['destinations', 'delicacies'];

$gallery_items = [];

foreach ($resources as &$resource) {
    $gallery_items[] = getAll($resource, "created_at", 'DESC');
}
unset($resource);
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
    <title>Home | Leyte Tourism</title>
</head>
<body>
    <!-- NAV -->
    <?php include_once '../templates/navbar.php'; ?>
    
    <!-- HERO -->
     <section class="hero" style="background-image: url('../assets/images/hero.jpg');">
        <div class="container hero__content">
            <h1>Explore the Province of Leyte</h1>
            <p>A land home to beautiful attractions, wonderful festivals, delicious food, and wonderful people.</p>
            <a href="destinations.php" class="btn btn-accent">Explore</a>
        </div>
    </section>
    
    <!-- ABOUT -->
    <section>
        <div class="container feature__layout">
            <div class="feature__figure">
                <img src="../assets/images/destinations/Alto Peak.jpg" alt="">
            </div>
            <div class="feature__content">
                <span>About the Province</span>
                <h2>The Heart of Eastern Visayas</h2>
                <p>Leyte is a province in the Philippines located in the Eastern Visayas region (Region VIII), occupying the northern and central sections of Leyte Island. It is widely recognized for its pivotal role in World War II and its status as a major producer of geothermal energy. </p>
                <a href="about.php" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </section>

    <!-- TOP DESTINATIONS -->
    <section class="section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Top Destinations</h2>
                <p>Explore the wonders of Leyte.</p>
            </div>

            <div class="grid-3">
                <?php foreach($featured_destinations as $destinations): ?>
                    <article class="card">
                        <img src="<?= "../uploads/destinations/" . $destinations['image_name'] ?>" alt=" <?= $destinations['name'] ?> ">
                        <div class="card__content">
                            <span> <?= $destinations['location'] ?></span>
                            <h3><?= $destinations['name'] ?></h4>
                            <p><?= $destinations['description'] ?></p>
                            <a href="destinations.php?id=<?= $destinations['id'] ?>">View</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- DELICACY -->
    <section>
        <div class="container feature__layout reverse">
            <div class="feature__figure">
                <img src="../uploads/delicacies/<?= $featured_delicacy['image_name'] ?>" alt="Featured Delicacy">
            </div>
            <div class="feature__content">
                <span>Featured Delicacy</span>
                <h2><?= $featured_delicacy['name'] ?></h2>
                <?php foreach(sliceToPar($featured_delicacy['description']) as $par): ?>
                    <p> <?= $par ?> </p>
                <?php endforeach; ?>
                <a href="delicacies.php?id=<?= $featured_delicacy['id'] ?>" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </section>


    <!-- FEATURED FESTIVALS -->
    <section class="section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Fun Festivals</h2>
                <p>Experience the festivals of Leyte along with its lovely people.</p>
            </div>

            <div class="grid-3">
                <?php foreach($featured_festivals as $festival): ?>
                    <article class="card">
                        <img src="../assets/images/destinations/Alto Peak.jpg" alt="">
                        <div class="card__content">
                            <span><?= $festival['location'] ?></span>
                            <h3><?= $festival['name'] ?></h4>
                            <p><?= $festival['description'] ?></p>
                            <a href="festivals.php?id=<?= $festival['id'] ?>">View</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="section-dark">
        <div class="container">
            <div class="section-header">
                <h2>Gallery</h2>
                <p>View the collection of pictures.</p>
            </div>

            <div class="gallery">
                <?php foreach($gallery_items as $gallery_item): ?>
                    <article class="gallery-item">
                        <img src="../assets/images/destinations/Alto Peak.jpg" alt="">
                        <div class="gallery-item__caption">
                            <p>Gallery Item</p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- LATEST NEWS -->
    <section class="section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Latest News</h2>
                <p>Keep up with whats happening in Leyte.</p>
            </div>

            <div class="grid-3">
                <?php foreach($latest_news as $news): ?>
                    <article class="card news-card">
                        <div class="card__content">
                            <span> <?= formatDate($news['created_at']) ?> </span>
                            <h3> <?= $news['title'] ?></h4>
                            <p><?= $news['content'] ?></p>
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