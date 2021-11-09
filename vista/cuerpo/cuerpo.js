let anterior = "";
let siguiente = "";

function listarRegistros(pagina) {
  document.getElementById("carga").removeAttribute("hidden");
  let borrar = document.getElementsByClassName("linea");
  while (borrar.length > 0) {
    borrar[0].parentNode.removeChild(borrar[0]);
  }
  
  let datos = new FormData();
  datos.append("pagina", pagina);
  let url = "../../controlador/controladorListaPokemon.php";

  fetch(url, {
    method: "POST",
    body: datos,
  })
    .then((res) => res.json())
    .then((response) => {
      console.log(response);
      anterior = response["anterior"];
      siguiente = response["siguiente"];
      if (anterior == null) {
        document.getElementById("anterior").disabled = true;
      } else {
        document.getElementById("anterior").disabled = false;
      }
      if (siguiente == null) {
        document.getElementById("siguiente").disabled = true;
      } else {
        document.getElementById("siguiente").disabled = false;
      }
      for (let i in response["lista"]) {
        let fila = document.createElement("div");
        let dato = response["lista"][i].nombre;

        let col1 = document.createElement("div");
        let imagen = response["lista"][i].imagen;
        col1.className = "linea";
        col1.addEventListener("click", cargarFormulario.bind(dato), false);
        fila.appendChild(col1);
        col1.innerHTML = `<img  class="imagen" src="${imagen}" alt="">`;

        let col2 = document.createElement("div");
        col2.className = "linea pokenombre";
        col2.addEventListener("click", cargarFormulario.bind(dato), false);
        fila.appendChild(col2);
        col2.innerHTML = response["lista"][i].nombre;

        let col3 = document.createElement("div");
        col3.className = "linea";
        col3.addEventListener("click", cargarFormulario.bind(dato), false);
        fila.appendChild(col3);
        col3.innerHTML = response["lista"][i].descripcion[0].descripcion;

        let col4 = document.createElement("div");
        col4.className = "linea";
        col4.addEventListener("click", cargarFormulario.bind(dato), false);
        fila.appendChild(col4);
        let tipos = "";
        for (let j = 0; j < response["lista"][i].tipo.length; j++) {
          tipos += response["lista"][i].tipo[j].tipo + ",";
        }
        col4.innerHTML = tipos.substring(0, tipos.length - 1);
        fila.className = "fila";
        contenedor.appendChild(fila);
      }
      document.getElementById("carga").setAttribute("hidden", true);
    });
}

window.onload = function () {
  listarRegistros("https://pokeapi.co/api/v2/pokemon/?limit=5");
};

function cargarFormulario() {
  let datos = new FormData();
  datos.append("codigo", this);
  let url = "../../controlador/controladorCargaFicha.php";
  fetch(url, {
    method: "POST",
    body: datos,
  })
    .then((res) => res.text())
    .then((response) => {
      document.getElementById("cuerpo").innerHTML = response;
    });
}

function seleccionado() {
  console.log(this);
}

function cargarSiguiente() {
  listarRegistros(siguiente);
}

function cargarAnterior() {
  listarRegistros(anterior);
}
