<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("127.0.0.1", 'root', '', 'leyte_tourism');

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->$connect->error);
}

function executeQuery($sql, $params = []) {
    global $conn;    

    $stmt = $conn->prepare($sql);
    if ($stmt->error) {
        die("Query failed: " . $stmt->error);
    }

    if (!empty($params)) {
        $types = '';

        foreach ($params as $key => $value) {
            $types .= is_int($value) ? 'i' : 's';
        }

        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();

    return $stmt;
}

function fetch($stmt, $single = false) {
    $result = $stmt->get_result();
    return $single ? $result->fetch_assoc() : $result->fetch_all(MYSQLI_ASSOC);
}
?>