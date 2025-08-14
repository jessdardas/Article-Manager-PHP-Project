<?php 
include "nav.php";
require_once "db.php"; 
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h2 class="page-title">Articles</h2>
    <a href="action.php?action=add" class="btn add-btn">+ Add New Article</a>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT articles.id, articles.title, articles.content, categories.name AS category 
                    FROM articles 
                    JOIN categories ON articles.category_id = categories.id";
            $result = $conn->query($sql);

            foreach($result as $r) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($r['title']) . "</td>";
                echo "<td>" . htmlspecialchars($r['category']) . "</td>";
                echo "<td>
                        <a class='btn small edit' href='action.php?action=edit&id=". $r['id'] ."&title=". urlencode($r['title'])."&content=".urlencode($r['content'])."&category=".urlencode($r['category'])."'>Edit</a>
                        <a class='btn small delete' href='action.php?action=delete&id=". $r['id'] ."'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
