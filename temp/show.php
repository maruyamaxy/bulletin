<?php include './temp/head.php'; ?>
<section>
  <div>
    <h2><?php echo $article[0]['title'];?></h2>
    <div class="btn btn-info">
      <a href="./create.php?id=<?php echo $request['id']; ?>">編集</a>
    </div>
  </div>
  <div>
    <?php echo $article[0]['title'];?>
  </div>
  <div>
    <?php echo $article[0]['content'];?>
  </div>
</section>
<?php include './temp/footer.php'; ?>
