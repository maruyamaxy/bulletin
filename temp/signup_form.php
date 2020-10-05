<?php include './temp/head.php'; ?>
<section class="container border">
  <div class="row header">
    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
    Sign In
  </div>
  <form action="" method="post">
    <input type="hidden" name="save" value="create">
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
    <div class="form-group">
      <label>生年月日</label>
      <input type="text" name="birthday" class="form-control">
    </div>
    <div class="form-group">
      <label>性別</label>
      <label>
        <input type="radio" name="sex" value="男">
        男
      </label>
      <label>
        <input type="radio" name="sex" value="女">
        女
      </label>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Sign in</button>
  </form>
</section>
<?php include './temp/footer.php'; ?>
