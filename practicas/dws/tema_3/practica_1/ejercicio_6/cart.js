document.addEventListener('DOMContentLoaded', async () => {
  let cartProductsContainer = document.getElementById(
    'cart-products-container'
  );
  await getCartProducts();
  await getTotalPrice();

  cartProductsContainer.addEventListener('click', async e => {
    let deleteBtn = e.target.closest('.delete-cart-product');

    if (e.target.closest('.delete-cart-product')) {
      await deleteCartProduct(deleteBtn);
      await getCartNumItems();
      await getCartProducts();
      await getTotalPrice();
    }
  });

  // This piece of code executes only after the user has done typing
  // For example if the user wnats to input 14 in quantity it will trigger at the first 1 and wont be able to write more
  // since the cart is regenerated and it will lose focus.
  // Thats why i added a timer so it will wait a bit after the last keyup
  cartProductsContainer.addEventListener('keyup', async e => {
    let quantityInput = e.target.closest('.quantity-cart-product');
    if (quantityInput) {
      await changeQuantityCartProduct(quantityInput);
      await getCartNumItems();
      await getTotalPrice();
    }
  });
});

async function getCartProducts() {
  let data = await fetchData({
    actionData: {
      name: 'cartAction',
      action: 'getCartProducts',
    },
    url: 'controller/cartProductsController.php',
  });

  document.getElementById('cart-products-container').innerHTML = data;
}

async function deleteCartProduct(deleteBtn) {
  let formData = new FormData();
  formData.append('id', deleteBtn.dataset.id);
  await fetchData({
    actionData: {
      name: 'cartAction',
      action: 'deleteCartProduct',
    },
    formData: formData,
    url: 'controller/cartProductsController.php',
  });
}

async function getTotalPrice() {
  let formData = new FormData();
  let data = await fetchData({
    actionData: {
      name: 'cartAction',
      action: 'getTotalPrice',
    },
    formData: formData,
    url: 'controller/cartProductsController.php',
  });

  document.getElementById('total-price').textContent = data;
}

async function changeQuantityCartProduct(quantityInput) {
  let formData = new FormData();
  formData.append('id', quantityInput.dataset.id);
  formData.append('quantity', quantityInput.value);
  await fetchData({
    actionData: {
      name: 'cartAction',
      action: 'changeQuantityCartProduct',
    },
    formData: formData,
    url: 'controller/cartProductsController.php',
  });
}
