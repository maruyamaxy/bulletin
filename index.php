<?php
require_once "./class/connect.php";
require_once "./session.php";
$request = $_REQUEST;
$db = new connect();

if($request['save'] === 'search') {
  $title = $request['title'];
  $item = 1;
  if($title) {
    $sql = "SELECT * FROM article WHERE title LIKE '$title' ";
  } else {
    $sql = "SELECT * FROM article";
  }
  $article = $db->select($sql);
} else {
  $sql = "SELECT * FROM article WHERE delete_at IS NULL LIMIT 3";
  $article = $db->select($sql);
}
// var_dump($item);
include './temp/top.php';
exit;
?>
