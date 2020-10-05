<?php include './temp/head.php'; ?>
<section>
  <form action="" method="post">
    <?php if($request['id']) { ?>
      <input type="hidden" name="save" value="update">
      <input type="hidden" name="id" value="<?php echo $request['id']; ?>">
    <?php } else { ?>
      <input type="hidden" name="save" value="create">
    <?php } ?>
    <div class="form-group">
      <label for="title">タイトル</label>
      <input type="text" name="title" class="form-control" id="title" placeholder="記事タイトル" value="<?php echo (isset($article[0]['title'])) ? $article[0]['title']: '';?>">
    </div>
    <div class="form-group">
      <label for="content">記事内容</label>
      <textarea id="content" name="content" rows="8" cols="80" class="form-control"><?php echo (isset($article[0]['content'])) ? $article[0]['content']: '';?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">登録する</button>
  </form>
</section>
<?php include './temp/footer.php'; ?>
