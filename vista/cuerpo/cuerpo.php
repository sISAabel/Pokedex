<link rel="stylesheet" href="../cuerpo/cuerpo.css">
<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
<script src="../cuerpo/cuerpo.js" defer></script>
<div id="carga" hidden>
  <img src="../logos/carga.gif" alt="carga">
</div>
<div class="cont">
  <div id="titulos">
    <h1>Nuestros Pokémon</h1>
  </div>
  <form id="formulario" method="POST">
    <input type="button" class="btn-grad" id="anterior" name="anterior" value="Anterior" onclick="cargarAnterior()">
    <input type="button" id="siguiente" class="btn-grad" name="siguiente" value="Siguiente" onclick="cargarSiguiente()">
  </form>
  <div id="contenedor" class="contenedor">
    <div class="elemento">Imagen</div>
    <div class="elemento">Nombre</div>
    <div class="elemento">Descripción</div>
    <div class="elemento">Tipo</div>
  </div>
</div>