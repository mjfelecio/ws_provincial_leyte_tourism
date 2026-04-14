<?php
function requireLogin() {
    session_start();
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        navigateTo("index.php");
    }
}

function logout() {
    session_start();
    session_unset();
    session_destroy();
    navigateTo("login.php");
}
?>