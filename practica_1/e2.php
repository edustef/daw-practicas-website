<?php include_once("../templates/header.php") ?><div class="block">
  <h1 class="title"> Ejercicio 2</h1>
  <?php
  $cadena1 = "Hola a todo el mundo ";
  $cadena2 = " mi nobre es Stefan Eduard";
  $cadena3 = $cadena1 . $cadena2;
  $cadena1 .= $cadena2;
  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <div class="box">
      <p>Cadena1: <?= $cadena1 ?></p>
      <p>Cadena3: <?= $cadena3 ?></p>
    </div>
  </div>
</div><?php include_once("../templates/footer.php") ?>