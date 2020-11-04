<?php include_once(__DIR__ . "/../../../../templates/header.php") ?><div class="block">

  <?php
  $radio = rand(0, 30);
  $area = pi() * pow($radio, 2);
  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <div class="box">
      <p>Area of circle with radius <?= $radio ?> is: <?= $area ?></p>
    </div>
  </div>
</div><?php include_once(__DIR__ . "/../../../../templates/footer.php") ?>