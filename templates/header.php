 <?php
  $IS_PRODUCTION = false;
  $root =  ($IS_PRODUCTION ? '/' : '/dws/practicas/');
  $practicas = json_decode(file_get_contents("./practicas.json"), true);
  ?>
 <html>

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Practicas DWS</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
 </head>

 <body>
   <div class="columns">
     <navbar id="navbar" class="menu column is-2 section" style="height: 100vh; overflow-y:auto; position:fixed">
       <a href=<?= "./index.php" ?>><strong>Home</strong></a>
       <?php
        foreach ($practicas as $practica => $practicaData) {
          echo '<details id="' . $practica . '">';
          $numberExercises = intval($practicaData["numberExercises"]);
          $practicaFormated = str_replace("_", " ", $practica);
          echo '<summary class="menu-label">' . ucfirst($practicaFormated) .  '</summary>';
          echo '<ul class="menu-list">';
          for ($i = 1; $i <= $numberExercises; $i++) {
            echo '<li><a href="' . $root . $practica . '/e' . $i . '.php">Ejercicio ' . $i . '</a></li>';
          }
          echo '</ul>';
          echo '</details>';
        }
        ?>
     </navbar>
     <!-- This div is a placeholder with the same size as navbar so it will push the right column instead of overlapping -->
     <div class="menu is-2 column section" style="height: 100vh; overflow-y:auto"></div>
     <div class="column section has-background-light" style="height: 100%; min-height:100vh;">