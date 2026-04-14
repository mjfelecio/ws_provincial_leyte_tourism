<?php

function setFlashMessage($type, $message) {
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message,
    ];
}

function getFlashMessage() {
    $message = $_SESSION['flash'];
    if (!isset($message)) return null;
    $_SESSION['flash'] = null;
    return $message;
}

function displayFlashMessage() {
    $message = getFlashMessage();
    $class = '';

    switch ($type) {
        case 'success':
            $class = "alert-success";
            break;

        case 'danger':
            $class = "alert-danger";
            break;
    }

    echo "<div class='alert $class'> $message </div>";
}

function dd($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}

function navigateTo($path) {
    header("Location: $path");
    exit;
}

function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function formatDate($date, $format = "F j, Y") {
   return date($format, strtotime($date));
}

function sliceToPar($string) {
    $paragraphs = explode("\n\n", $string);
    $paragraphs = array_filter(array_map("trim", $paragraphs));
    return $paragraphs;
}

?>
