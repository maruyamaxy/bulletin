<?php
require_once "./class/connect.php";
$request = $_REQUEST;
$isValidateError = true;
$validateErrors = array();
// var_dump($request['save']);
if($request['save'] === 'create') {
  var_dump(3333);
  function formValidation($request) {
    //必須項目チェック対象指定
    $requiredCheck = array(
      // '全角テキスト' => $request['input_text'],
      // 'カタカナ' => $request['input_kana'],
      'メールアドレス' => $request['email'],
      // '電話番号' => $request$request['input_tel'],
      // 'URL' => $request['input_url'],
      // '郵便番号' => $request['input_zipcode'],
      '性別' => $request['sex'],
      // 'チェックボックス' => $request['input_checkbox'],
      // 'セレクトボックス' => $request['input_selectbox'],
      // '複数行テキスト' => $request['input_textarea']
      '名前' => $request['name'],
      'パスワード' => $request['password'],
    );
    //メールアドレスフォーマットチェック対象指定
    $emailFormatCheck = array(
      'メールアドレス' => $request['email']
    );

    //必須項目バリデートチェック
    foreach ($requiredCheck as $key => $value) {
      if(empty($value)) {
        $validateErrors[] = $key.'の項目は必須入力です';
      }
    }

    //メールアドレスバリデートチェック
    foreach ($emailFormatCheck as $key => $value) {
      if(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/',$value)) {
        $validateErrors[] = $key.'を正しく入力してください';
      }
    }
  }

  $validateErrors = formValidation($request);
  if(empty($validateErrors)) {
    $isValidateError = false;
  } else {
    $isValidateError = true;
  }

  if($isValidateError === false) {
    // var_dump(2222);
    // exit;
    $db = new connect();
    $password = password_hash($request['password'], PASSWORD_BCRYPT);
    $request['role_id'] = 2;
    $sql = "INSERT INTO user (name, email, password, birthday,sex, role_id)
    VALUES ('".$request['name']."','".$request['email']."', '".$password."', '".$request['birthday']."', '".$request['sex']."', '".$request['role_id']."')";
    $item = 1;
    $db->execution($sql, $item);
  }
}

include './temp/signup_form.php';
exit;
?>
