/**
 * Fetches HTML genereted text from the server
 * @param {string} action Action to perform before getting the data back
 * @param {FormData} formData Data you want to send
 * @return {string} Returns the data in HTML form or
 */
async function fetchData(action, formData, url) {
  formData.append("action", action);

  try {
    let res = await fetch(url, {
      method: "POST",
      body: formData,
    });

    if (res.ok) {
      let data = await res.text();
      return data;
    } else {
      console.log(err);
    }
  } catch (err) {
    console.log(err);
  }

  return "Something went wrong";
}
