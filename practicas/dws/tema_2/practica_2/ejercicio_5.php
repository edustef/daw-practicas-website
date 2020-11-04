<?php include_once(__DIR__ . "/../../../../templates/header.php") ?>
<div class="block">

  <?php
  include("ejercicio_5/caesar_encrypt_decrypt.php");

  $word = "AZelloz";
  $clave = 3;
  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <p>Encripting message: <?= '<strong>' . $word . '</strong>' . " with key: " . '<strong>' . $clave . '</strong>' ?></p>
    <div class="box">
      <?= encriptar($word, $clave) ?>
    </div>
    <?php
    $wordEncripto = encriptar($word, $clave);
    ?>
    <p>Decripting message: <?= '<strong>' . $wordEncripto . '</strong>' . " with key: " . '<strong>' . $clave . '</strong>' ?></p>
    <div class="box">
      <?= decriptar($wordEncripto, $clave) ?>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../../templates/footer.php") ?>