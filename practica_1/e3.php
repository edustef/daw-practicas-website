<?php include_once("../templates/header.php") ?><div class="block">
  <h1 class="title"> Ejercicio 3</h1>
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
</div><?php include_once("../templates/footer.php") ?>