  <?php include_once("./templates/header.php"); ?>
  <h1 class="title">
    Practicas de PHP
  </h1>
  <p class="subtitle">
    Here lives all my php projects.
  </p>

  <?php
  include_once "templates/createPage.php";

  $practicas = json_decode(file_get_contents("practicas.json"), true);

  foreach ($practicas as $practica => $practicaData) {
    createPage($practica, $practicaData["numberExercises"]);
  }

  ?>
  </div>
  </div>

  <?php include_once("templates/footer.php"); ?>