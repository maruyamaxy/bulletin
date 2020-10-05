<?php include './temp/head.php'; ?>
<section class="container border">
  <div class="row header">
    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
    Sign Up
  </div>
  <form action="" method="post">
    <input type="hidden" name="save" value="login">
    <div class="form-group">
      <label>名前</label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
      <label>アドレス</label>
      <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
      <label>パスワード</label>
      <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary pull-right">Sign Up</button>
  </form>
<?php include './temp/footer.php'; ?>
