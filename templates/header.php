 <?php
  include_once(__DIR__ . "/../config.php");

  $temas = array_diff(scandir(__DIR__ . "/../practicas"), array(".", ".."));
  natcasesort($temas);
  $phpSelfArr = explode("/", $_SERVER["PHP_SELF"]);
  $activePage =  implode("/", array_slice($phpSelfArr, count($phpSelfArr) - 3, 3));
  ?>
 <html data-theme="light">

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Practicas DWS</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
   <link rel="stylesheet" href=<?= SITE_URL . "style.css" ?>>
 </head>

 <body>
   <div class="columns">
     <navbar id="navbar" class="menu column is-2 section" style="height: 100vh; overflow-y:auto; position:fixed">
       <div class="level">
         <a class="is-size-4" href=<?= SITE_URL . "index.php" ?>><strong>Home</strong></a>
         <a id="theme-toggler" href="#"><i class="far fa-moon is-size-4"></i></a>
       </div>
       <?php
        foreach ($temas as $tema) {
          $absolutePathToPracticas = __DIR__ . '/../practicas/';
          $temaFormated = str_replace("_", " ", $tema);
          $practicas = array_diff(scandir($absolutePathToPracticas . $tema), array(".", ".."));
          natcasesort($practicas);
          echo '<details class="mt-2" id="' . $tema . '">';
          echo '<summary class="menu-label">' . $temaFormated .  '</summary>';
          echo '<ul class="menu-list">';
          foreach ($practicas as $practica) {
            $practicaFormated = str_replace("_", " ", $practica);
            $ejercicios = array_diff(scandir($absolutePathToPracticas . $tema . '/' . $practica), array(".", ".."));
            natcasesort($ejercicios);
            echo '<details class="mt-2 ml-2" id="' . $practica . '">';
            echo '<summary class="menu-label">' . $practicaFormated .  '</summary>';
            echo '<ul class="menu-list">';
            foreach ($ejercicios as $ejercicio) {
              $ejercicioFormated = explode(".", str_replace("_", " ", $ejercicio))[0];
              $pathToPage = $tema . '/' . $practica . '/' . $ejercicio;;
              $absolutePathToEjercicio = $absolutePathToPracticas . $pathToPage;

              if (is_file($absolutePathToEjercicio)) {
                if ($pathToPage == $activePage) {
                  $_SESSION["currentPagePath"] = $pathToPage;
                  echo '<li><a class="is-active" href="' . SITE_URL . 'practicas/' . $pathToPage . '">' . $ejercicioFormated . '</a></li>';
                } else {
                  echo '<li><a href="' . SITE_URL . 'practicas/' . $pathToPage . '">' . $ejercicioFormated . '</a></li>';
                }
              }
            }
            echo '</ul>';
            echo '</details>';
          }
          echo '</ul>';
          echo '</details>';
        }
        ?>
     </navbar>
     <!-- This div is a placeholder with the same size as navbar so it will push the right column instead of overlapping -->
     <div class="menu is-2 column section" style="height: 100vh; overflow-y:auto"></div>
     <div class="column section has-background-light has-text-black" style="height: 100%; min-height:100vh;">