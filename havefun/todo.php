<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon"/>
    <base target="_blank">
    <title>更新to do信息</title>
</head>
<body>
<?php
require_once 'php/rootConn.php';
$queryShowTodoTitle = "SELECT DISTINCT title FROM todo";
$resultShowTodoTitle = mysqli_query($conn, $queryShowTodoTitle);
while ($showTodoTitle = mysqli_fetch_assoc($resultShowTodoTitle)) {
    ?>
    <?php
    $queryShowTodo = "SELECT id, item, content, visible, time FROM todo WHERE title='" . $showTodoTitle['title']."'";
    $resultShowTodo = mysqli_query($conn, $queryShowTodo);
    while ($showTodo = mysqli_fetch_assoc($resultShowTodo)) {
        ?>
        <form action="php/updateTodo.php" method="post">
            <input type="text" name="id" value="<?php echo $showTodo['id']; ?>" size="1">
            <input type="text" name="title" value="<?php echo $showTodoTitle['title']; ?>">
            <input type="text" name="item" value="<?php echo $showTodo['item']; ?>">
            <input type="text" name="content" value="<?php echo $showTodo['content']; ?>">
            <input type="text" name="time" value="<?php echo $showTodo['time']; ?>">
            <input type="text" name="visible" value="<?php echo $showTodo['visible']; ?>" size="1">
            <input type="submit" name="button" value="Update">
            <input type="submit" name="button" value="Delete">
        </form>
    <?php } ?>
<?php } ?>
<form action="php/updateTodo.php" method="post">
    <input type="text" name="id" value="" size="1" placeholder="ID">
    <input type="text" name="title" value="" placeholder="Title">
    <input type="text" name="item" value="" placeholder="Item">
    <input type="text" name="content" value="" placeholder="Content">
    <input type="submit" name="button" value="Create1">
</form>
</body>
</html>

