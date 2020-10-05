<?php
require_once "./class/connect.php";
$request = $_REQUEST;

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

if($request['save'] === 'login') {
  session_start();
  $name = $request['name'];
  $email = $request['email'];
  $password = $request['password'];
  $db = new connect();
  $sql = "SELECT * FROM user WHERE name = :name AND email = :email";
  $user = $db->login($sql, $email, $name, $password);
  // var_dump($_SESSION);
  // exit;
  if($user) {
    $_SESSION['ID'] = $user['id'];
    $_SESSION['NAME'] = $user['name'];
    $_SESSION['EMAIL'] = $user['email'];
    header("location: index.php?#completemodal");
    exit;
  }
}

include './temp/login.php';
exit;
?>
