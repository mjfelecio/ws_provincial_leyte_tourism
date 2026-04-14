<?php 
function getAll($table, $orderBy = 'id', $order = 'DESC') {
    return fetch(executeQuery("SELECT * FROM $table ORDER BY $orderBy $order"));
}

function getById($table, $id) {
    return fetch(executeQuery("SELECT * FROM $table WHERE id = ?", [$id]), true);
}

function deleteById($table, $id) {
    executeQuery("DELETE FROM $table WHERE id = ?", [$id]);
}

function insert($table, $data) {
    $columns = implode(",", array_keys($data));
    $placeholders = implode(",", array_fill(0, count($data), "?"));

    executeQuery(
        "INSERT INTO $table ($columns) values ($placeholders)",
        array_values($data)
    );
}

function update($table, $data, $id) {
    $fields = [];

    foreach ($data as $key => $value) {
        $fields[] = "$key=?"; 
    }

    $fields = implode(",", $fields);
    $params = array_values($data);
    $params[] = $id;

    executeQuery(
        "UPDATE $table SET $fields WHERE id = ?",
        $params
    );
}

function uploadImage($imageFile, $dir) {
    if (!isset($imageFile)) return;

    if (!str_starts_with($imageFile['type'], 'image/') || !getimagesize($imageFile['tmp_name'])) return;

    $ext = strtolower(pathinfo($imageFile['name'], PATHINFO_EXTENSION));
    $name = uniqid() . time() . "." . $ext;
    $path = rtrim($dir, "\\") . "\\" . $name;

    return move_uploaded_file($imageFile['tmp_name'], $path) ? $name : false;
}

function deleteImage($imageName, $dir) {
    $path = rtrim($dir, "\\") . "\\" . $imageName;
    if (file_exists($path)) {
        unlink($path);
    }
}

function crud($table, $uploadDir) {
    $data = [];
    
    $action = $_GET['action'] ?? 'list';
    $id = $_GET['id'] ?? null;

    foreach ($_POST as $key => $value) {
        $data[$key] = sanitizeInput($value);
    }

    if (!isset($data['is_featured'])) {
        $data['is_featured'] = false;
    }

    $hasImage = isset($_FILES['image']) && $_FILES['image']['error'] === 0;

    if ($hasImage) {
        $imageName = uploadImage($_FILES['image'], $uploadDir);

        if ($imageName === false) return;

        $data['image_name'] = $imageName;
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if ($action === "add") {
            insert($table, $data);
            navigateTo("?");
        }
        
        elseif ($action === "edit" && $id) {
            $old = getById($table, $id);

            if ($hasImage && $old['image_name']) {
                deleteImage($old['image_name'], $uploadDir);
            }

            update($table, $data, $id);
            navigateTo("?");
        }
    }

    if ($action === "delete") {
        $item = getById($table, $id);

        if (isset($item['image_name'])) {
           deleteImage($item['image_name'], $uploadDir);
        }

        deleteById($table, $id);
        navigateTo("?");
    }
}

?>