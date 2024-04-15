<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="Views/css/style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?= $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif; ?>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $article['title'] ?></td>
            <td><?= $article['description'] ?></td>
            <td>
                <a href="index.php?action=viewArticle&id=<?= $article['id']; ?>">View</a>
            </td>
            <td>
                <a href="index.php?action=editArticle&id=<?= $article['id']; ?>">Edit</a>
            </td>
            <td>
                <a href="index.php?action=deleteArticle&id=<?= $article['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<form method="post" action="index.php?action=addArticle">
    <input type="text" name="title" placeholder="Title"><br>
    <input name="description" placeholder="Description"><br>
    <input type="hidden" name="action" value="addArticle">
    <button type="submit" name="addArticle" class="btn">Save</button>
</form>
</body>
</html>
