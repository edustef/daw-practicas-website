document.addEventListener("DOMContentLoaded", async () => {
  let cartProductsContainer = document.getElementById(
    "cart-products-container"
  );
  await getCartProducts();

  cartProductsContainer.addEventListener("click", async (e) => {
    let deleteBtn = e.target.closest(".delete-cart-product");

    if (e.target.closest(".delete-cart-product")) {
      await deleteCartProduct(deleteBtn);
      await getCartNumItems();
      await getCartProducts();
    }
  });

  // This piece of code executes only after the user has done typing
  // For example if the user wnats to input 14 in quantity it will trigger at the first 1 and wont be able to write more
  // since the cart is regenerated and it will lose focus.
  // Thats why i added a timer so it will wait a bit after the last keyup
  let typingTimer;
  let doneTypingInterval = 300;
  cartProductsContainer.addEventListener("keyup", async (e) => {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(
      () => executeChangeQuantityCartProduct(e),
      doneTypingInterval
    );
  });
  cartProductsContainer.addEventListener("keydown", async (e) => {
    clearTimeout(typingTimer);
  });
});

async function getCartProducts() {
  let data = await fetchData({
    actionData: {
      name: "cartAction",
      action: "getCartProducts",
    },
    url: "controller/cartProductsController.php",
  });

  document.getElementById("cart-products-container").innerHTML = data;
}

async function deleteCartProduct(deleteBtn) {
  let formData = new FormData();
  formData.append("id", deleteBtn.dataset.id);
  let data = await fetchData({
    actionData: {
      name: "cartAction",
      action: "deleteCartProduct",
    },
    formData: formData,
    url: "controller/cartProductsController.php",
  });
}

async function executeChangeQuantityCartProduct(e) {
  let quantityInput = e.target.closest(".quantity-cart-product");
  if (quantityInput) {
    await changeQuantityCartProduct(quantityInput);
    await getCartNumItems();
    await getCartProducts();
  }
}

async function changeQuantityCartProduct(quantityInput) {
  let formData = new FormData();
  formData.append("id", quantityInput.dataset.id);
  formData.append("quantity", quantityInput.value);
  let data = await fetchData({
    actionData: {
      name: "cartAction",
      action: "changeQuantityCartProduct",
    },
    formData: formData,
    url: "controller/cartProductsController.php",
  });
}
