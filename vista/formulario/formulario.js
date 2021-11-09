function cargarInicio() {
  let datos = new FormData();
  let url = "../cuerpo/cuerpo.php";
  fetch(url, {
    method: "POST",
    body: datos,
  })
    .then((res) => res.text())
    .then((response) => {
      console.log(response);
      document.getElementById("cuerpo").innerHTML = response;
      listarRegistros();
    });
}