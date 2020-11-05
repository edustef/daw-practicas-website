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

function getActivePage()
{
  $phpSelfArr = explode('/', $_SERVER['PHP_SELF']);
  return implode('/', array_slice($phpSelfArr, - (FOLDER_DEPTH + 1)));
}

function removeExtension($string)
{
  $string = explode('.', $string);
  array_pop($string);

  return implode('.', $string);
}
