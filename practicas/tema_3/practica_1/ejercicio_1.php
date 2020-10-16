<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-6 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  $basketballTeams = array(
    "lakers" => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Los_Angeles_Lakers_logo.svg/1200px-Los_Angeles_Lakers_logo.svg.png",
    "goldenStateWarriors" => "https://upload.wikimedia.org/wikipedia/en/thumb/0/01/Golden_State_Warriors_logo.svg/1200px-Golden_State_Warriors_logo.svg.png",
    "bostonCeltics" => "https://a.espncdn.com/i/teamlogos/nba/500/bos.png",
    "houstonRockets" => "https://upload.wikimedia.org/wikipedia/commons/6/6c/Houston-Rockets-logo.png",
    "miamiHeat" => "https://upload.wikimedia.org/wikipedia/en/thumb/f/fb/Miami_Heat_logo.svg/1200px-Miami_Heat_logo.svg.png"
  );


  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <div class="box">
      <div class="tile is-ancestor">
        <div class="tile is-parent is-vertical is-4">
          <?php
          if (isset($_GET["basketballTeams"])) {
            if ($_GET["basketballTeams"] != "none") {
              echo '<div class="tile is-child">';
              echo '    <figure class="image is-4by3">';
              echo '        <img src="' . $basketballTeams[$_GET["basketballTeams"]] . '" style="object-fit:scale-down">';
              echo '    </figure>';
              echo '</div>';
            }
          }
          ?>
          <form class="tile is-child" action="" method="GET">
            <div class="field">
              <label class="label">Favourite Basketball Team</label>
              <div class="control">
                <div class="select">
                  <select name="basketballTeams">
                    <option value="none">Select dropdown</option>
                    <option value="lakers">Los Angeles Lakers</option>
                    <option value="goldenStateWarriors">Golden State Warriors</option>
                    <option value="bostonCeltics">Buston Celtics</option>
                    <option value="houstonRockets">Houston Rockets</option>
                    <option value="miamiHeat">Miami Heat</option>
                  </select>
                </div>
              </div>
            </div>
            <button class="button is-primary" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>