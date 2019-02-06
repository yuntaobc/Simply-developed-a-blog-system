<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon"/>
    <base target="_blank">
    <title>更新Friends信息</title>
</head>
<body>
<?php
require_once 'php/rootConn.php';
$queryShowFriends = "SELECT id, item, link, info, visible FROM friends";
$resultShowFriends = mysqli_query($conn, $queryShowFriends);
while ($showFriends = mysqli_fetch_assoc($resultShowFriends)) {
    ?>
    <form action="php/updateFriends.php" method="post">
        <input type="text" name="id" value="<?php echo $showFriends['id'] ?>" size="1">
        <input type="text" name="item" value="<?php echo $showFriends['item'] ?>">
        <input type="text" name="link" value="<?php echo $showFriends['link'] ?>">
        <input type="text" name="info" value="<?php echo $showFriends['info'] ?>">
        <input type="text" name="visible" value="<?php echo $showFriends['visible'] ?>" size="1">
        <input type="submit" name="button" value="Update">
        <input type="submit" name="button" value="Delete">
    </form>
<?php } ?>
<form action="php/updateFriends.php" method="post">
    <input type="text" name="id" value="" size="1" placeholder="ID">
    <input type="text" name="item" value="" placeholder="Who?">
    <input type="text" name="link" value="" placeholder="Link">
    <input type="text" name="info" value="" placeholder="Info">
    <input type="submit" name="button" value="Create1">
</form>
</body>
</html>

