<?php
header("Content-Type:text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");
require_once "rootConn.php";

if ($conn) {

    $id = $_POST['id'];
    $item = $_POST['item'];
    $link = $_POST['link'];
    $info = $_POST['info'];
    $visible = $_POST['visible'];

    echo 'ID:' . $id . '<br>Item:' . $item . '<br>传送门:' . $link . '<br>描述:' . $info . '<br>发布成功:';

    if($_POST['button'] == 'Update'){
        $query = "UPDATE friends SET item = '$item',link='$link', info = '$info' WHERE id = $id";
    }
    else if ($_POST['button'] == 'Delete'){
        $visible = ($visible + 1) % 2;
        $query = "UPDATE friends SET visible=$visible WHERE id=$id";
    }
    else{
        $query = "INSERT INTO friends (id,item,link,info) VALUES ($id,'$item','link','info')";
    }

    if (mysqli_query($conn, $query)) echo "OK";
}
mysqli_close($conn);

exit;
