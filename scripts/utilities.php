<?php
function getArrayOfFilePaths(&$filePaths, $target, $depthLimit, $depth = 0)
{
  $filePath = explode(DIRECTORY_SEPARATOR, $target);
  $currDir = $filePath[array_key_last($filePath) - 1];

  if (is_dir($target)) {

    $files = glob($target . '*', GLOB_MARK);
    natcasesort($files);

    // remove first directory and don't include directories of the last depth
    if ($depth < $depthLimit && $depth > 0) {
      foreach ($files as $file) {
        getArrayOfFilePaths($filePaths[$currDir], $file, $depthLimit, $depth + 1);
      }
    } else {
      foreach ($files as $file) {
        getArrayOfFilePaths($filePaths, $file, $depthLimit, $depth + 1);
      }
    }
  } else {
    if ($depth <= $depthLimit) {
      $file = explode(DIRECTORY_SEPARATOR, $target);
      $file = array_slice($file, -$depth);
      $filePath = implode('/', $file);
      $filePaths[] = $filePath;
    }
  }
}

function createMenu($filePath, $depth = 3)
{
  if (is_array($filePath)) {
    if ($depth == 0) {
      foreach ($filePath as $key => $value) {
        createListItem($value);
      }
    } else {
      foreach ($filePath as $key => $value) {
        $folder = str_replace('_', '-', $key);
        echo '
                <details id="' . $folder . '" class="mt-2 ml-2">
                  <summary class="menu-label">' . str_replace('-', ' ', $folder) . '</summary>
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

function createListDetail($detail)
{
}


function getActivePage()
{
  $phpSelfArr = explode('/', $_SERVER['PHP_SELF']);
  return implode('/', array_slice($phpSelfArr, -4));
}

function removeExtension($string)
{
  $string = explode('.', $string);
  array_pop($string);

  return implode('.', $string);
}
