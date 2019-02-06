<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css"/>
    <base target="_blank"/>
    <title>文章修改，删除，发布</title>
</head>
<body>
<table class="edit">
    <tbody>
    <tr class="edit-nav">
        <td colspan="5"><h3>文章管理 | <a href="php/create.php">文章发布</a> | <a href="about.php">信息管理</a> | <a
                        href="todo.php">To do管理</a></h3></td>
    </tr>
    <tr class="edit-nav2">
        <th>ID</th>
        <th>标题</th>
        <th>View</th>
        <th>是否可见</th>
        <th>Operate</th>
    </tr>
    <?php
    require_once 'php/rootConn.php';
    $queryShowAll = "SELECT id,title,views,visible FROM post ";
    $resultShowAll = mysqli_query($conn, $queryShowAll);
    while ($showAll = mysqli_fetch_assoc($resultShowAll)) {
        ?>
        <tr class="edit-content">
            <td class="edit-content-id"><?php echo $showAll['id']; ?></td>
            <td class="edit-content-title"><?php echo '<a href="/post/' . $showAll['id'] . '.html">' . $showAll['title'] . '</a>'; ?></td>
            <td class="edit-content-views"><?php echo $showAll['views'] ?></td>
            <td class="edit-content-visible"><?php echo $showAll['visible'] ?></td>
            <td class="edit-content-alter"><a href="php/update.php?id=<?php echo $showAll['id']; ?>"
                                              target="blank">修改</a> |
                <a href="php/deletePost.php?id=<?php echo $showAll['id'] . "&visible=" . $showAll['visible']; ?>"
                   target="blank">删除</a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    <?php mysqli_close($conn); ?>
</table>
</body>
</html>
