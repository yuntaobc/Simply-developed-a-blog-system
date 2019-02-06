<?php
header("Content-Type:text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");
require_once "rootConn.php";

if ($conn) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $item = $_POST['item'];
    $content = $_POST['content'];
    $visible = $_POST['visible'];

    echo 'ID:' . $id . '<br>标题:' . $title . '<br>Item:' . $item . '<br>内容:' . $content . '<br>发布成功:';
    if($_POST['button'] == 'Update'){
        $query = "UPDATE about SET title='$title', item = '$item', content = '$content' WHERE id = $id";
    }
    else if ($_POST['button'] == 'Delete'){
        $visible = ($visible + 1) % 2;
        $query = "UPDATE about SET visible=$visible WHERE id=$id";
    }
    else{
        $query = "INSERT INTO about (id,title,item,content) VALUES ($id, '$title', '$item', '$content')";
    }

    if (mysqli_query($conn, $query)) echo "OK";
}
mysqli_close($conn);

exit;
