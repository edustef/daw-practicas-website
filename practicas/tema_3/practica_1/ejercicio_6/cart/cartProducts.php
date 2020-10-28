<?php
include('../products/products.php');
$_SESSION['cartProducts'] = array();

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'addProduct' && isset($_POST['id'])) {
    addProduct($_POST['id'], $products);
    echo getNumOfCartProducts();
  } elseif ($_POST['action'] == 'removeProduct') {
    removeProduct();
  } elseif ($_POST['action'] == 'clearCart') {
    clearCart($_POST['id']);
  } else {
    echo "Error: no action found";
  }
}

function addProduct($id, $products)
{
  $_SESSION['cartProducts'][] = array_search($id, array_column($products, 'id'));
}

function removeProduct()
{
}

function clearCart()
{
}

function getCartProducts()
{
  $output = '';
  $output .= '<div class="columns is-multiline">';
  foreach ($_SESSION['cartProducts'] as $cartProduct) {
    $cartProductHTML = '
  <div class="product column is-narrow is-one-third">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by3">
          <img src="' . $cartProduct['imgUrl'] . '" alt="Placeholder image">
        </figure>
      </div>
      <div class="card-content">
        <p class="title is-4">' . $cartProduct['title'] . '</p>
        <div class="content">
          ' . $cartProduct['desc'] . '
          <p class="mt-4 has-text-primary is-size-4">' . $cartProduct['price'] . '€</p>
        </div>
      </div>
      <footer class="card-footer">
        <a id="add-product" href="#" class="card-footer-item">
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

    $output .= $cartProductHTML;
  }
  $output .= '</div>';

  return $output;
}

function getNumOfCartProducts()
{
  return count($_SESSION['cartProducts']);
}
