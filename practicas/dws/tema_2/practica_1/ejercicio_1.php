<?php include_once(__DIR__ . "/../../../../templates/header.php") ?>
<div class="block">
  <?php
  // rand() gives a number between 0 and getrandmax(); or range(min, max) if you provide arguments it will be between the first and secon parameter. 
  $n1 = rand();
  $n2 = rand();
  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <div class="box">
      <p><?= $n1 ?> - <?= $n2 ?> = <?= $n1 - $n2 ?></p>
      <p><?= $n1 ?> / <?= $n2 ?> = <?= $n1 / $n2 ?></p>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../../templates/footer.php") ?>