 <?php
  include_once(__DIR__ . "/../config.php");

  $practicas = array_diff(scandir(__DIR__ . "/../practicas"), array(".", ".."));
  natcasesort($practicas);
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
       <a class="is-size-4" href=<?= SITE_URL . "index.php" ?>><strong>Home</strong></a>
       <?php
        foreach ($practicas as $practica) {
          $practicaFormated = str_replace("_", " ", $practica);
          $ejercicios = array_diff(scandir(__DIR__ . '/../practicas/' . $practica), array(".", ".."));
          natcasesort($ejercicios);
          echo '<details class="mt-2" id="' . $practica . '">';
          echo '<summary class="menu-label">' . $practicaFormated .  '</summary>';
          echo '<ul class="menu-list">';
          foreach ($ejercicios as $ejercicio) {
            echo '<li><a href="' . SITE_URL . 'practicas/' . $practica . '/' . $ejercicio . '">' . $ejercicio . '</a></li>';
          }
          echo '</ul>';
          echo '</details>';
        }
        ?>
     </navbar>
     <!-- This div is a placeholder with the same size as navbar so it will push the right column instead of overlapping -->
     <div class="menu is-2 column section" style="height: 100vh; overflow-y:auto"></div>
     <div class="column section has-background-light" style="height: 100%; min-height:100vh;">