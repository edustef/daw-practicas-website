<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-6 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  $_SESSION["asignaturas"]["DWS"] = 0;
  $_SESSION["asignaturas"]["DWC"] = 0;
  $_SESSION["asignaturas"]["DI"] = 0;
  $_SESSION["asignaturas"]["DAW"] = 0;
  $_SESSION["asignaturas"]["EIE"] = 0;
  $_SESSION["asignaturas"]["LC"] = 0;
  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <div class="box">
      <div class="columns is-vcentered is-mobile">
        <div class="column is-narrow">
          <div class="level">
            <div class="level-item">
              <button class="button is-danger mr-4">
                <span class="icon is-small">
                  <i class="fas fa-minus"></i>
                </span>
              </button>
              <button class="button is-primary">
                <span class="icon is-small">
                  <i class="fas fa-plus"></i>
                </span>
              </button>
            </div>
          </div>
        </div>
        <div class="column is-size-4 is-narrow">DWS</div>
        <div class="column">
          <progress class="progress is-primary" value="15" max="100">15%</progress>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>