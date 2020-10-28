<?php
session_start();
include('../model/products.php');

if (!isset($_SESSION['cartProducts'])) {
  $_SESSION['cartProducts'] = array();
}


if (isset($_POST['cartAction'])) {
  $res = 'error';
  switch ($_POST['cartAction']) {
    case 'addCartProduct':
      if (isset($_POST['id'])) {
        addCartProduct($_POST['id'], $products);
        $res = '<pre>' . print_r($_SESSION['cartProducts'], true) . '</pre>';
      }
      break;
    case 'getCartProducts':
      $res = getCartProducts();
      break;
    case 'removeProduct':
      break;
    case 'clearCart':
      break;
    case 'getCartNumItems':
      $res = getCartNumItems();
      break;
  }

  echo $res;
}

function addCartProduct($id, $products)
{
  $_SESSION['cartProducts'][] = $products[array_search($id, array_column($products, 'id'))];
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
  $output .= '<div>';
  foreach ($_SESSION['cartProducts'] as $cartProduct) {
    $cartProductHTML = '
  <div class="cartProduct">
    <div class="level">
      <div class="level-left">
          <div class="level-item">
          <figure class="image is-3by4">
            <img src="' . $cartProduct['imgUrl'] . '" alt="Placeholder image">
          </figure>
        </div>
      </div>
      <div class="level-item">
        <p class="title is-4">' . $cartProduct['title'] . '</p>
        <div class="content">
          ' . $cartProduct['desc'] . '
          <p class="mt-4 has-text-primary is-size-4">' . $cartProduct['price'] . '€</p>
        </div>
      </div>
      <div class="level-right">
        <div class="level-item"> 
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
        </div>
      </div>
    </div>
  </div>';

    $output .= $cartProductHTML;
  }
  $output .= '</div>';

  return $output;
}

function getCartNumItems()
{
  return count($_SESSION['cartProducts']);
}
