<?php
require_once "./class/connect.php";
require_once "./session.php";
$request = $_REQUEST;
$isValidateError = true;
$validateErrors = array();
$db = new connect();

function formValidation($request) {
  //必須項目チェック対象指定
  $requiredCheck = array(
    'タイトル' => $request['title'],
    '内容' => $request['content'],
  );

  //必須項目バリデートチェック
  foreach ($requiredCheck as $key => $value) {
    if(empty($value)) {
      $validateErrors[] = $key.'の項目は必須入力です';
    }
  }
}

if($request['save'] === 'create') {
  $validateErrors = formValidation($request);
  if(empty($validateErrors)) {
    $isValidateError = false;
  } else {
    $isValidateError = true;
  }
  if($isValidateError === false) {
    $contributor_id = $_SESSION['ID'];
    $sql = "INSERT INTO article (title, content, contributor_id)
    VALUES ('".$request['title']."','".$request['content']."', '".$contributor_id."')";
    $item = 1;
    $db->execution($sql, $item);
    header("location: index.php");
    exit;
  }
} else if($request['save'] === 'update') {
  $validateErrors = formValidation($request);
  if(empty($validateErrors)) {
    $isValidateError = false;
  } else {
    $isValidateError = true;
  }
  if($isValidateError === false) {
    $sql = "UPDATE article SET title = '".$request['title']."', content = '".$request['content']."' WHERE id = '".$request['id']."'  ";
    $item = 1;
    $db->execution($sql, $request['id']);
    header("location: index.php");
    exit;
  }
}

if($request['id']) {
  $id = $request['id'];
  $sql = "SELECT * FROM article WHERE id = $id";
  $article = $db->select($sql);
}

include "./temp/create.php";
exit;
?>
