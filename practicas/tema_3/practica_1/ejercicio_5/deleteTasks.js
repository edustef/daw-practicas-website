document.getElementById("delete-tasks").addEventListener("click", (e) => {
  // let formData = new FormData();
  // formData.append("action", "deleteTasks");
  console.log("hello");
  fetch(
    "/practicas/dws/practicas/tema_3/practica_1/ejercicio_5.php?action=deleteTask"
  );
});
