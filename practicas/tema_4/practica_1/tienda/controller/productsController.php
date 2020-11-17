<?php
session_start();
include('../model/products.php');

if (isset($_POST['productAction'])) {
  $res = 'error';
  switch ($_POST['productAction']) {
    case 'getProducts':
      $res = getProducts($products);
      break;
    case 'addProduct':
      $res = addProduct();
      break;
  }

  echo $res;
}

function getProducts($products)
{
  $output = '';
  $output .= '<div class="columns is-multiline">';
  foreach ($products as $product) {
    $productHTML = '
  <div class="product column is-narrow is-one-third">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by3">
          <img src="' . $product['imgUrl'] . '" alt="Placeholder image">
        </figure>
      </div>
      <div class="card-content">
        <p class="title is-4">' . $product['title'] . '</p>
        <div class="content">
          ' . $product['desc'] . '
          <p class="mt-4 has-text-primary is-size-4">' . $product['price'] . '€</p>
        </div>
      </div>
      <footer class="card-footer">
        <a data-id="' . $product['id'] . '" class="add-product card-footer-item">
          <span class="icon mr-2">
            <i class="fas fa-cart-plus"></i>
          </span>
          <span>Add to cart</span>
        </a>
        <a href="#" class="card-footer-item">
          <span class="icon mr-2">
            <i class="fas fa-ellipsis-h"></i>
          </span>
          <span>See details</span>
        </a>
      </footer>
    </div>
  </div> ';

    $output .= $productHTML;
  }
  $output .= '</div>';

  return $output;
}

function addProduct()
{
  $msg = 'ok';
  $target_dir = "../productImages/";
  $target_file = $target_dir . basename($_FILES["image-file"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["image-file"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    $msg = "File is not an image.";
    $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    $msg = "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["image-file"]["size"] > 500000) {
    $msg = "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $msg = "Sorry, your file was not uploaded." . $msg;
    // if everything is ok, try to upload file
  } else {
    if (!move_uploaded_file($_FILES["image-file"]["tmp_name"], $target_file)) {
      $msg = "Sorry, there was an error uploading your file.";
    }
  }

  return $msg;
}
