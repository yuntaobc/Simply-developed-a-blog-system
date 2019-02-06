<?php
header("Content-Type:text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");
require_once "rootConn.php";

if ($conn) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $tag = $_POST['tag'];
    $intro = $_POST['intro'];
    $content = $_POST['id-markdown-doc'];
    $content = addslashes($content);

    echo '标题:'.$title.'<br>ID:'.$id.'<br>介绍:'.$intro.'<br>内容:<pre>'.$content.'</pre><br>发布成功:';

    $queryUpdate = "UPDATE post SET title = '$title', intro = '$intro', content = '$content', tag = '$tag' WHERE id = $id";

    if (mysqli_query($conn, $queryUpdate)) echo "OK";
}
mysqli_close($conn);

exit;
