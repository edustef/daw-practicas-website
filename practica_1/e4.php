<?php include_once("../templates/header.php") ?><div class="block">
  <h1 class="title"> Ejercicio 4</h1>
  <?php
  $a = 1;
  $b = 4;
  $c = 5;
  $D = $b * $b - 4 * $a * $c;

  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <?php
    echo '<div class="box">';
    if ($D >= 0) {
      $x1 = (-$b + sqrt($D)) / (2 * $a);
      $x2 = (-$b - sqrt($D)) / (2 * $a);
      echo "<p>Roots of the equation ax^2 + bx + c = 0 are: </p>";
      echo "<p>$x1 and $x2</p>";
      echo "<p>Where a, b, c are $a, $b and $c.</p>";
    } else {
      $x1 = -$b / (2 * $a);
      $x2 = sqrt(-$D) / (2 * $a);
      echo "<p>Roots of the equation ax^2 + bx + c = 0 are imaginary.</p>";
      echo "<p>Real part of root x1: $x1</p>";
      echo "<p>Imaginary part of root x2: $x2</p>";
      echo "<p>Where a, b, c are $a, $b and $c.</p>";
    }
    echo '</div>';
    ?>
  </div>
</div><?php include_once("../templates/footer.php") ?>