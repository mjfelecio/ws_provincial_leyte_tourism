<?php

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
    <title>About Us | Leyte Tourism</title>
</head>
<body>
    <!-- NAV -->
    <?php include_once '../templates/navbar.php'; ?>
    
    <!-- HERO -->
     <section class="hero page-hero" style="background-color: var(--primary);">
        <div class="container hero__content">
            <h1>About Leyte</h1>
        </div>
    </section>

    <!-- DELICACY -->
    <section>
        <div class="container feature__layout reverse">
            <div class="feature__figure">
                <img src="../assets/images/delicacies/moron.png" alt="Featured Delicacy">
            </div>
            <div class="feature__content">
                <span>About the Province</span>
                <h2>Leyte Province</h2>
                <p>Leyte is a historic, agricultural, and resource-rich province in the Philippines' Eastern Visayas region (Region VIII), with Tacloban City as its capital. Known for the World War II Battle of Leyte Gulf and the MacArthur Landing, the province is also a major energy producer, hosting Asia’s largest geothermal power plant.</p>
            </div>
        </div>
    </section>

    <!-- TOP DESTINATIONS -->
    <section class="section-alt">
        <div class="container">
            <div class="section-header">
                <h2> Contact </h2>
            </div>

            <div class="feature-card-container">
                <article class="feature-card">
                    <span>&phone;</span>
                    <h4>Phone Number</h4>
                    <p>09935607219</p>
                </article>

                <article class="feature-card">
                    <span>&commat;</span>
                    <h4>Email</h4>
                    <a href="https://leyteprovince.gov.ph/contact-us" class="link">https://leyteprovince.gov.ph/contact-us</p>
                </article>
            </div>
        </div>
    </section>

    <?php include_once '../templates/sub-footer.php' ?>
    <!-- JS -->
    <script src="../assets/js/main.js"></script>
</body>
</html>