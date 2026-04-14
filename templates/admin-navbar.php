<?php
    $nav_items = [
        "index.php" => "Dashboard",
        "news.php" => "News",
        "destinations.php" => "Destinations",
        "delicacies.php" => "Delicacies",
        "festivals.php" => "Festivals",
        "../index.php" => "View Website",
    ];

    $active_url = basename($_SERVER['SCRIPT_FILENAME']);
?>

<nav class="nav">
    <div class="container nav__inner">
        <a href="" class="nav__brand">Admin Dashboard</a>
        <button type="button" class="nav__toggle" onclick="toggleVisibility('.nav')">&#9776;</button>
        <ul class="nav__links">
            <?php foreach($nav_items as $url => $label): ?>
                <li>
                    <a href="<?= $url ?>" class="nav__link <?= ($active_url === $url) ? "active" : "" ?>">
                        <?= $label ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <li><a href="logout.php" class="btn btn-outline">Logout</a></li>
        </ul>
    </div>
</nav>