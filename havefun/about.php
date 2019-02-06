<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon"/>
    <base target="_blank">
    <title>更新About信息</title>
</head>
<body>
<?php
require_once 'php/rootConn.php';
$queryShowAboutTitle = "SELECT DISTINCT title FROM about";
$resultShowAboutTitle = mysqli_query($conn, $queryShowAboutTitle);
while ($showAboutTitle = mysqli_fetch_assoc($resultShowAboutTitle)) {
    ?>
    <?php
    $queryShowAbout = "SELECT id, item, content, visible FROM about WHERE title='" . $showAboutTitle['title']."'";
    $resultShowAbout = mysqli_query($conn, $queryShowAbout);
    while ($showAbout = mysqli_fetch_assoc($resultShowAbout)) {
        ?>
        <form action="php/updateAbout.php" method="post">
            <input type="text" name="id" value="<?php echo $showAbout['id']; ?>" size="1">
            <input type="text" name="title" value="<?php echo $showAboutTitle['title']; ?>">
            <input type="text" name="item" value="<?php echo $showAbout['item']; ?>">
            <input type="text" name="content" value="<?php echo $showAbout['content']; ?>">
            <input type="text" name="visible" value="<?php echo $showAbout['visible']; ?>" size="1">
            <input type="submit" name="button" value="Update">
            <input type="submit" name="button" value="Delete">
        </form>
    <?php } ?>
<?php } ?>
<form action="php/updateAbout.php" method="post">
    <input type="text" name="id" value="" size="1" placeholder="ID">
    <input type="text" name="title" value="" placeholder="Title">
    <input type="text" name="item" value="" placeholder="Item">
    <input type="text" name="content" value="" placeholder="Content">
    <input type="submit" name="button" value="Create1">
</form>
</body>
</html>

