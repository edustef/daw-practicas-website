<?php
function addWord($spanishWord, $englishWord, &$dict)
{
  include('writeToDictionaryFile.php');

  $dict[$spanishWord] = $englishWord;

  writeToDictionaryFile($dict);
}
