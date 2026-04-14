<?php
require_once '../../includes/db.php';
require_once '../../includes/helpers.php';
require_once '../../includes/auth.php';
require_once '../../includes/crud.php';

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;
$table = "destinations";

$formData = null;
if ($action === "edit" && $id) {
    $formData = getById($table, $id);
}

crud(
    $table,
    __DIR__ . "\..\..\uploads\\$table"
);

$items = getAll($table);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/variables.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/layout.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Destinations Management</title>
</head>
<body>
    <?php include_once '../../templates/admin-navbar.php' ?>

    <main>
        <div class="container">
            <!-- LIST SECTION -->
            <?php if ($action === "list"): ?>
                <div class="admin-header">
                    <h2>Destinations Management</h2>
                    <a href="?action=add" class="btn btn-primary btn-square">+ Add Destinations</a>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Is Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td> <?= $item['id'] ?> </td>
                                <td> <?= $item['name'] ?> </td>
                                <td> <?= $item['location'] ?> </td>
                                <td> <?= $item['is_featured'] === 1 ? "&starf;" : "&star;" ?> </td>
                                <td class="action-buttons">
                                    <a href="?action=edit&id=<?= $item['id'] ?>" class="btn btn-primary btn-sm btn-square">
                                        Edit
                                    </a>
                                    <a onclick="return confirm('Are you sure you want to delete this item?')" href="?action=delete&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm btn-square">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <!-- FORM SECTION -->
            <?php elseif ($action === "add" || $action === "edit"): ?>
                <div class="admin-header">
                    <h2>Destinations Management</h2>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input value="<?= $formData ? $formData['name'] : '' ?>" required type="text" name="name" id="name" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="location" class="form-label">Location</label>
                        <input value="<?= $formData ? $formData['location'] : '' ?>" required type="text" name="location" id="location" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea required type="text" name="description" id="description" class="form-textarea"> <?= $formData ? htmlspecialchars_decode($formData['description']) : "" ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="is_featured" class="form-label">Featured</label>
                        <div class="checkbox-container">
                            <input <?= !empty($formData['is_featured']) ? 'checked' : '' ?> value="1" type="checkbox" name="is_featured" id="is_featured" class="form-input">
                            <p class="text-muted" onclick="is_featured.checked = !is_featured.checked">Is item featured?</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-input" accept="image/*">
                        <img id="imagePreview" class="image-preview" src="<?= "../../uploads/$table/" . $formData ? $formData['image_name'] : "" ?>" alt="Image Preview">
                     </div>

                    <button type="submit" class="btn btn-primary btn-square">Save</button>
                    <a href="?" class="btn btn-danger btn-square">Cancel</a>
                </form>
            <?php endif; ?>
        </div>
    </section>

    <script src="../../assets/js/main.js"></script>
</body>
</html>