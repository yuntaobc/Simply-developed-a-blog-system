<?php
header("Content-Type:text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");
require_once "rootConn.php";

if ($conn) {
    $id = $_GET['id'];
    $visible = $_GET['visible'];
    $visible = ($visible + 1) % 2;
    $queryDelete = "UPDATE post SET visible = $visible WHERE id = $id";
    if (mysqli_query($conn, $queryDelete)) echo "OK";
}
mysqli_close($conn);
exit;
