<?php
require_once '../../includes/db.php';
require_once '../../includes/helpers.php';
require_once '../../includes/auth.php';
require_once '../../includes/crud.php';

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;
$table = "news";

$formData = null;
if ($action === "edit" && $id) {
    $formData = getById($table, $id);
}

crud(
    $table,
    __DIR__ . "/../../uploads/$table"
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
    <title>News Management</title>
</head>
<body>
    <?php include_once '../../templates/admin-navbar.php' ?>

    <main>
        <div class="container">
            <!-- LIST SECTION -->
            <?php if ($action === "list"): ?>
                <div class="admin-header">
                    <h2>News Management</h2>
                    <a href="?action=add" class="btn btn-primary btn-square">+ Add News</a>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Uploaded At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td> <?= $item['id'] ?> </td>
                                <td> <?= $item['title'] ?> </td>
                                <td> <?= $item['content'] ?> </td>
                                <td> <?= formatDate($item['created_at']) ?> </td>
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
                    <h2>News Management</h2>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input value="<?= $formData ? $formData['title'] : '' ?>" required type="text" name="title" id="title" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="content" class="form-label">Content</label>
                        <textarea required type="text" name="content" id="content" class="form-textarea"> <?= $formData ? htmlspecialchars_decode($formData['content']) : "" ?></textarea>
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