document
  .getElementById('add-product-form')
  .addEventListener('submit', async e => {
    e.preventDefault();
    let formData = new FormData(e.target);

    let data = await fetchData({
      actionData: {
        name: 'productAction',
        action: 'addProduct',
      },
      formData: formData,
      url: 'controller/productsController.php',
    });
    if (data == 'ok') {
      window.location.replace('index.php?successPost');
    }
  });