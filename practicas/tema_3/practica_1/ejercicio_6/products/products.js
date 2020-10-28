document.querySelectorAll(".product").forEach(() => {
  document.getElementById("add-product").addEventListener("click", (e) => {
    let formData = new FormData();
    formData.append("id", e.target.dataset.id);
    fetchData("addProduct", formData, "cart/cartProducts.php");
  });
});
