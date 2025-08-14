<?php
include "nav.php";
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php

////////////////// ADD ////////////////////////

if ($_GET['action'] == "add") { ?>
    <form class="form-container" method="POST" action="action.php?action=add">
        <label class="form-label">Title:</label>
        <input type="text" name="title" class="form-input">

        <label class="form-label">Category:</label>
        <select name="category" class="form-select">
            <?php
            $sql = "SELECT id, name FROM categories";
            $result = $conn->query($sql);
            foreach ($result as $r) {
                echo "<option value='{$r['id']}'>{$r['name']}</option>";
            }
            ?>
        </select>

        <label for="content" class="form-label">Content:</label>
        <textarea id="content" name="content" class="form-textarea"></textarea>

        <input type="submit" value="Create" class="btn btn-primary">
    </form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $title = $_POST['title'];
    $category_id = $_POST['category'];
    $content = $_POST['content'];

    $sql = "INSERT INTO `articles`(`id`, `title`, `content`, `category_id`) VALUES ('$id', '$title', '$content', '$category_id')";
    $result = $conn->query($sql);   
    header("Location:index.php");
} }

///////////////////////////////// EDIT //////////////////////////////////////

if ($_GET['action'] == "edit") {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
        $t = $_GET['title'];
        $cont = $_GET['content'];
        $cat = $_GET['category'];
?>
    <form class="form-container" method="POST" action="action.php?action=edit&id=<?php echo $id; ?>">
        <label class="form-label">Title:</label>
        <input type="text" name="EditedTitle" value="<?php echo $t ?>" class="form-input">

        <label class="form-label">Category:</label>
        <select name="EditedCategory" class="form-select">
        <?php
            $sql = "SELECT id, name FROM categories";
            $result = $conn->query($sql);
            foreach ($result as $r) {
                if (($r['name']) == $cat) {
                    echo "<option value='{$r['id']}' selected>{$r['name']}</option>";
                } else {
                    echo "<option value='{$r['id']}'>{$r['name']}</option>";
                }
            }
        ?>
        </select>

        <label class="form-label">Content:</label>
        <textarea name="EditedContent" class="form-textarea"><?php echo "$cont"; ?></textarea>

        <input type="submit" value="Update" class="btn btn-success">
    </form>
<?php
    } 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_GET['id'];
        $ti = $_POST['EditedTitle'];
        $category_id = $_POST['EditedCategory'];
        $content = $_POST['EditedContent'];

        $sql = "UPDATE `articles` SET `title`='$ti', `content`='$content', `category_id`='$category_id' WHERE id=$id";
        $result = $conn->query($sql);   
        header("Location:index.php");
    }
}

/////////////////////////////// DELETE /////////////////////////////////////

if ($_GET['action'] == "delete") {
    $id = $_GET['id'];

    $sql = "DELETE FROM `articles` WHERE id=$id";
    $conn->query($sql);

    header("Location:index.php");
}
?>
</body>
</html>
