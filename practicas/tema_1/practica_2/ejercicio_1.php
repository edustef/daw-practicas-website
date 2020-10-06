<?php include_once(__DIR__ . "/../../../templates/header.php") ?>

<div class="block">
  <h1 class="title">Tema 2 Ejercicio 1</h1>
  <?php
  $cadena1 = "Lo que estoy escribiendo es un string";
  $cadena2 = "muuuuuy largo";
  $cadena3 = $cadena1 . $cadena2;
  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <p>La posición de la primera ‘e’.</p>
    <div class="box">

    </div>
    <p>La posición de la última ‘u’.</p>
    <div class="box">

    </div>
    <p>La posición de la palabra “texto”</p>
    <div class="box">

    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>