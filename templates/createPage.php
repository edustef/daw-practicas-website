<?php
function createPage($practicaDirectory, $numberOfExercises)
{
  $headerData = '<?php include_once("../templates/header.php") ?>';
  $footerData = '<?php include_once("../templates/footer.php") ?>';


  // <?php
  // $radio = rand(0, 30);
  // $area = pi() * pow($radio, 2);
  // >
  // <div class="content is-medium">
  //   <p>Result: </p>
  //   <p>Area of circle with radius <?= $radio > is: <?= $area ></p>

  // </div>
  $childLeft = '<div class="block"><h1 class="title"> Ejercicio ';
  $childRight = '</h1><div class="content is-medium"> <p>Result: </p></div></div>';

  if (is_dir($practicaDirectory) === false) {
    mkdir($practicaDirectory);
  }

  for ($i = 1; $i <= $numberOfExercises; $i++) {
    $pathToFile = './' . $practicaDirectory . '/e' . $i . '.php';
    if (!file_exists($pathToFile)) {
      file_put_contents($pathToFile, $headerData . $childLeft . $i . $childRight . $footerData);
    }
  }
}
