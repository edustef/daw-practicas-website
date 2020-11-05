<?php

function createMenu($filePath, $depth)
{
  if (is_array($filePath)) {
    if ($depth == 0) {
      foreach ($filePath as $key => $value) {
        createListItem($value);
      }
    } else {
      foreach ($filePath as $key => $value) {
        echo '
<details id="' . $key . '" class="mt-2 ml-2">
  <summary class="menu-label">' . str_replace('_', ' ', $key) . '</summary>
  <ul class="menu-list">
    ';

        createMenu($value, $depth - 1);

        echo '
  </ul>
</details>
';
      }
    }
  }
}

function createListItem($path)
{

  $item = removeExtension($path);
  $item = explode('/', $item);
  $item = $item[array_key_last($item)];
  $item = str_replace('_', ' ', $item);


  $activePage = getActivePage();
  if ($path == $activePage) {
    $_SESSION["activePagePath"] = $activePage;
    echo '<li><a class="is-active" href="' . SITE_URL . 'practicas/' . $path . '">' . $item . '</a></li>';
  } else {
    echo '<li><a href="' . SITE_URL . 'practicas/' . $path . '">' . $item . '</a></li>';
  }
}
