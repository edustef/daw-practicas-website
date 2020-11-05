 <?php
  session_start();
  include_once(__DIR__ . "/../config.php");
  include_once(__DIR__ . "/../scripts/utilities.php");

  $filesPaths = array();
  $pathToFolder = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'practicas' . DIRECTORY_SEPARATOR;

  getArrayOfFilePaths($filesPaths, $pathToFolder, 4);
  // echo '<pre>' . print_r($filePaths, true) . '</pre>';

  ?>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Practicas DWS</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
   <link rel="stylesheet" property="stylesheet" href="ejercicio_5/bulma-calendar-extension/css/bulma-calendar.min.css">
   <style>
     body {
       overflow: hidden;
     }

     .is-hidden {
       display: none;
     }

     .is-fullview-width {
       min-width: 100vw;
     }

     .side-navbar {
       min-height: 100vh;
       height: 100%;
       overflow-y: auto;
       min-width: 18rem;
     }

     #navbar {
       position: fixed;
     }

     #main-container {
       height: 100%;
       min-height: 100vh;
     }
   </style>
 </head>

 <body>
   <div class="columns is-mobile">
     <navbar id="navbar" class="side-navbar column is-2 section has-background-white">
       <a class="is-size-4" href=<?= SITE_URL . "index.php" ?>><strong>Home</strong></a>
       <?php

        createMenu($filesPaths);

        ?>
     </navbar>
     <!-- This div is a placeholder with the same size as navbar so it will push the right column instead of overlapping -->
     <div id="fake-navbar" class="side-navbar is-2 column section"></div>
     <div id="main-container" class="is-fullview-width column section has-background-light">
       <button class="button has-background-dark mb-4" id="toggle-navbar" style="position: fixed;">
         <span class="icon has-text-white"><i class="fas fa-bars"></i></span>
       </button>
       <div style="height:4rem"></div>
       <?php
        $activePage = removeExtension(getActivePage());
        $activePageArr = explode('/', $activePage);
        ?>
       <header class="mb-4" style="<?= $activePageArr[array_key_last($activePageArr)] == 'index' ? 'display:none' : '' ?>">
         <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePage) ?></p>
         <h1 class="title"><?= ucfirst($activePageArr[array_key_last($activePageArr)]) ?></h1>
       </header>