<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $data = file_get_contents('https://edition.cnn.com/');
  file_put_contents('trump/news.html', $data);
  ?>
  <div class="box">
    <?php
    echo 'The number of times "Trump" is mentioned in the CNN homepage: <strong>' . substr_count($data, 'Trump') . '</strong>';
    ?>
    <hr>
    <img src="trump/news.jpg" alt="" style="max-width:1200px">
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>