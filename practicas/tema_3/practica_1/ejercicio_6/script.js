document.addEventListener("DOMContentLoaded", async () => {
  await updateCartNumItems();

  document.querySelectorAll(".add-product").forEach((product) => {
    product.addEventListener("click", async (e) => {
      await addCartProduct(e);
      await updateCartNumItems();
    });
  });
});

async function updateCartNumItems() {
  let data = await fetchData({
    actionData: {
      name: "cartAction",
      action: "getCartNumItems",
    },
    url: "controller/cartProductsController.php",
  });
  document.getElementById("cart-num-items").textContent = data;
}

async function addCartProduct(e) {
  let formData = new FormData();
  formData.append("id", e.currentTarget.dataset.id);
  let data = await fetchData({
    actionData: {
      name: "cartAction",
      action: "addCartProduct",
    },
    formData: formData,
    url: "controller/cartProductsController.php",
  });

  console.log(data);
}

async function getProducts() {
  let data = await fetchData({
    actionData: {
      name: "productAction",
      action: "getProducts",
    },
    url: "controller/productsController.php",
  });

  document.getElementById("products-container").innerHTML = data;
}

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
