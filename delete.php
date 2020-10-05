<?php
require_once "./class/connect.php";
require_once "./session.php";
$request = $_REQUEST;
$isValidateError = true;
$validateErrors = array();
$db = new connect();
$time = date("Y-m-d H:i:s");
$sql = "UPDATE article SET delete_at = '".$time."' WHERE id = '".$request['id']."'  ";
$item = 1;
$db->execution($sql, $request['id']);
header("location: index.php");
exit;
?>
