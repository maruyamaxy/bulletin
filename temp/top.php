<?php include './temp/head.php'; ?>
<section>
  <h2>練習用掲示板</h2>
  <div>
    <div class="btn btn-info">
      <?php if(isset($_SESSION['EMAIL'])) { ?>
        <a href="./logout.php">ログアウト</a>
      <?php } else { ?>
        <a href="./login.php">ログイン</a>
      <?php } ?>
    </div>
    <?php if(!isset($_SESSION['EMAIL'])) { ?>
      <div class="btn btn-info">
        <a href="./signup.php">会員新規登録</a>
      </div>
    <?php } ?>
  </div>
</section>
<?php if(isset($_SESSION['EMAIL'])) { ?>
  <section>
    <form action="./index.php" method="get">
      <input type="hidden" name="save" value="search">
      <div>
        <label>タイトル</label>
        <input type="text" name="title">
        <button class="btn btn-info">
          検索
        </button>
      </div>
    </form>
    <div class="btn btn-info">
      <a href="./create.php">記事投稿</a>
    </div>
  </section>
<?php } ?>
<table class="table">
  <thead>
    <tr>
      <th>番号</th>
      <th>タイトル</th>
      <?php if($_SESSION) { ?>
        <th>詳細</th>
        <th>削除</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($article as $key => $val) { ?>
      <tr>
        <td><?php echo $val['title']; ?></td>
        <td><?php echo $val['content']; ?></td>
        <?php if($_SESSION) { ?>
          <td>
            <div class="btn btn-info">
              <a href="./show.php?id=<?php echo $val['id']; ?>">詳細</a>
            </div>
          </td>
          <td>
            <?php if($_SESSION['ID'] === $val['contributor_id']) { ?>
              <div class="btn btn-danger">
                <a href="./delete.php?save=delete&id=<?php echo $val['id']; ?>">削除</a>
              </div>
            <?php } ?>
          </td>
        <?php } ?>
      </tr>
    <?php } ?>
  </tbody>
</table>
<?php include './temp/footer.php'; ?>
