<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-6 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  $path = '/practicas/dws/practicas/tema_3/ejercicio_5';
  $domain = $_SERVER['SERVER_NAME'];
  $ads = array(
    array(
      'description' => 'A new resort in Sierra Nevada!! Make a reservation right now!',
      'imgUrl' => 'https://bulma.io/images/placeholders/300x640',
      'category' =>
      'sport',
      'tags' => array('snowboarding', 'mountains', 'hiking', 'sky')
    ),
  );
  if (isset($_COOKIE['sports'])) {
  } else {
    setcookie('sports', json_encode($preferedSports), time() + 60 * 60 * 24, '/practicas/dws/practicas', $_SERVER['SERVER_NAME'], false, true);
  }

  /**
   * This will return the ID of the best possible ad based by the number of tags in common
   */
  function getPersonalizedAd($ads)
  {
    // filter ads

    // now return a random one from selected
  }

  function createImageWithDesc($imageLink, $desc)
  {
    return $imageLink . 'text=' . preg_replace('/\s+/', '+', $desc);
  }
  ?>
  <div class="tile is-ancestor">
    <div class="tile is-vertical is-9">
      <div class="tile is-parent">
        <article class="tile is-child p-6 has-background-primary-light">
          <p class="title">Personalize your ads</p>
          <div class="content">
            <form action="" method="POST">
              <div class="field">
                <label class="label">Subject</label>
                <label class="checkbox">
                  <input type="checkbox">
                  item
                </label>
              </div>
            </form>
          </div>
        </article>
      </div>
    </div>
    <div class="tile is-parent">
      <div class="tile is-child">
        <figure class="tile is-child image is-3by4">
          <img src="https://via.placeholder.com/300x640">
        </figure>
      </div>
    </div>
  </div>
</div> <?php include_once(__DIR__ . "/../../../templates/footer.php") ?>