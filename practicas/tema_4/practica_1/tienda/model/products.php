<?php

function readProducts($path)
{
  $products = array();
  $data = file_get_contents($path);
  $productsRaw = explode('|', $data);

  if ($productsRaw !== false) {

    //removes the last empty value
    unset($productsRaw[array_key_last($productsRaw)]);
    $productsRaw = array_values($productsRaw);

    foreach ($productsRaw as $productRaw) {
      if (isset($productRaw)) {

        $pd = explode('@', $productRaw);

        $products[] = array('id' => $pd[0], 'title' => $pd[1], 'desc' => $pd[2], 'imgUrl' => $pd[3], 'price' => $pd[4]);
      }
    }
  }
  return $products;
}

function getLastId($path)
{
  $data = file_get_contents($path);
  $productsRaw = explode('|', $data);

  if (count($productsRaw) > 1) {

    unset($productsRaw[array_key_last($productsRaw)]);
    $productsRaw = array_values($productsRaw);

    $lastProduct = explode('@', $productsRaw[array_key_last($productsRaw)]);
  } else {
    return 0;
  }
  return $lastProduct[0];
}
