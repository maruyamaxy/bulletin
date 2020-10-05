<?php

class connect {

  const UTF='utf8';

  /**
   * DBに接続するための関数
   * @return [type] [description]
   */
  function pdo()
  {
    try {
      require_once "./inc/db.php";
      // データベースの接続
      $db = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
      echo '接続失敗';
      var_dump($e);
      echo 'error' .$e->getMesseage;
      die();
      // exit;
    }
    // var_dump($db);
    // exit;
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    return $db;
  }

  /**
   * select文の時に使用する関数
   * @param  [type] $sql [description]
   * @return [type]      [description]
   */
  function select($sql)
  {
    try {
      $select = $this->pdo();
      $stmt = $select->query($sql);
      $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $items;
    } catch (PDOException $e) {
      var_dump($e);
    }
  }

  /**
   * select insert, update, deleteの時に使用する関数
   * @param  [type] $sql  [description]
   * @param  [type] $item [description]
   * @return [type]       [description]
   */
  function execution($sql, $item)
  {
    $execution = $this->pdo();
    $stmt = $execution->prepare($sql);
    //sql文のVALUES等の値が?の場合は$itemでもいい。
    $stmt->execute(array(':id'=>$item));

    return $stmt;
  }

  /**
   * ログイン認証機能
   * @param  [type] $sql      [description]
   * @param  [type] $email    [description]
   * @param  [type] $name     [description]
   * @param  [type] $password [description]
   * @return [type]           [description]
   */
  function login($sql, $email, $name, $password)
  {
    try {
      $pdo = $this->pdo();
      $stmt = $pdo->prepare($sql);
      $stmt->execute([':name'=>$_REQUEST['name'], ':email'=>$_REQUEST['email']]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
      echo $e->getMessage() . PHP_EOL;
    }
    //emailがDB内に存在しているか確認
    if (!isset($user['email'])) {
      echo 'メールアドレス又はパスワードが間違っています。';
      return false;
    }
    //パスワード確認後sessionにメールアドレスを渡す
    if (password_verify($password, $user['password'])) {
      session_regenerate_id(true); //session_idを新しく生成し、置き換える
      // echo 'ログインしました';
      // var_dump($_SESSION);
      // exit;
      return $user;
    } else {
      echo 'メールアドレス又はパスワードが間違っています。';
      return false;
    }
  }

}
?>
