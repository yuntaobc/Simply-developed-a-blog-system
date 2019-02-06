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
    $item = $_POST['item'];
    $content = $_POST['content'];
    $visible = $_POST['visible'];
    if($_POST['button'] == 'Update'){
        $time = $_POST['time'];
        $query = "UPDATE todo SET title='$title', item = '$item', content = '$content',time = '$time' WHERE id = $id";
    }
    else if ($_POST['button'] == 'Delete'){
        $visible = ($visible + 1) % 2;
        $query = "UPDATE todo SET visible=$visible WHERE id=$id";
    }
    else{
        $time = $showDate[0];
        $query = "INSERT INTO todo (id,title,item,content,time) VALUES ($id, '$title', '$item', '$content','$time')";
    }

    echo 'ID:' . $id . '<br>标题:' . $title . '<br>Item:' . $item . '<br>内容:' . $content .'<br>日期:'.$time. '<br>发布成功:';
    if (mysqli_query($conn, $query)) echo "OK";
}
mysqli_close($conn);

exit;
