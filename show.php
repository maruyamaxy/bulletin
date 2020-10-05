<?php
require_once "./class/connect.php";
require_once "./session.php";
$request = $_REQUEST;
$db = new connect();
if($request['id']) {
  $id = $request['id'];
  $sql = "SELECT * FROM article WHERE id = $id";
  $article = $db->select($sql);
}

include "./temp/show.php";
exit;
?>
