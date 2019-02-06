<?php
header("Content-Type:text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");
require_once "rootConn.php";

if ($conn) {
    $queryShowDate = "select now()";
    $resultShowDate = mysqli_query($conn, $queryShowDate);
    $showDate = mysqli_fetch_array($resultShowDate);
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $date = $showDate[0];
    $tag = $_POST['tag'];
    $intro = $_POST['intro'];
    $content = $_POST['id-markdown-doc'];
    $content = addslashes($content);

    echo '标题:'.$title.'<br>ID:'.$id.'<br>日期:'.$date.'<br>标签:'.$tag.'<br>介绍:'.$intro.'<br>内容:<pre>'.$content.'</pre><br>发布成功:';

    $queryInsert = "INSERT INTO post (title,id,date,tag,intro,content) VALUES ('$title','$id','$date','$tag','$intro','$content')";

    if (mysqli_query($conn, $queryInsert)) echo "OK";
}
mysqli_close($conn);
exit;