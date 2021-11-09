<link rel="stylesheet" href="../formulario/formulario.css">

<?php
require_once "../modelo/pokemon.php";
$codigo = $_POST["codigo"];
$pokemon = new POKEMON();
$pokemon->cargarPokemon($codigo);
?>

<div class="pokedex">
  <div class="pokedexTapa1"></div>
  <div id="ficha">
    <aside>
      <div class="renglon">
        <span id="nombre" class="texto"><?= $pokemon->nombre ?></span>
      </div>
      <div class="img">
        <img class="imagen" id="foto" src="<?= $pokemon->imagen ?>" alt="Foto del Pokemon">
      </div>
      <div class="renglon">
        <label for="codigo" class="titulos">Pokedex</label>
        <span id="codigo" class="texto">
          <?php
          if ($pokemon->codigo <= 9) {
            echo 0 . 0 . $pokemon->codigo;
          } elseif ($pokemon->codigo >= 10 and $pokemon->codigo <= 99) {
            echo 0 . $pokemon->codigo;
          } else {
            echo $pokemon->codigo;
          }
          ?>
        </span>
      </div>
    </aside>
    <article>
      <div class="renglon">
        <div class="forma">
          <label for="altura" class="titulos">Peso</label>
          <span id="peso" class="texto"><?= $pokemon->peso ?> kg</span>
        </div>
        <div class="forma">
          <label for="altura" class="titulos">Altura</label>
          <span id="altura" class="texto"><?= $pokemon->altura ?> m</span>
        </div>
      </div>
      <div class="renglon">
        <label for="tipo" class="titulos">Tipo</label>
        <?php
        for ($i = 0; $i < count($pokemon->tipo); $i++) {
          echo "<div class='texto'>" . $pokemon->tipo[$i]["tipo"] . '</div>';
        }
        ?>
      </div>
      <div class="renglon">
        <label for="habilidades" class="titulos">Habilidades</label>
        <?php
        for ($i = 0; $i < count($pokemon->habilidades); $i++) {
          echo "<div class='texto'>" . $pokemon->habilidades[$i] . "</div>";
        } ?>
      </div>
      <div class="renglon">
        <label for="movimiento" class="titulos">Movimientos</label>
        <div class="movimientos">
          <?php
          for ($i = 0; $i < count($pokemon->movimiento); $i++) {
            echo "<div class='elemento'>" . $pokemon->movimiento[$i]["movimiento"] . '</div>';
          }
          ?>
        </div>
      </div>
      <div class="renglon">
        <div id="titulos" class="titulos">
          <div class="titulos">Juegos</div>
          <div class="titulos">Descripciones</div>
        </div>
      </div>
      <div class="renglon">
        <div id="contenedor" class="descripciones">
          <?php
          for ($i = 0; $i < count($pokemon->descripcion); $i++) {
            echo "<div class='elemento'>" . $pokemon->descripcion[$i]["juego"] . "</div>";
            echo "<div class='elemento'>" . $pokemon->descripcion[$i]["descripcion"] . "</div>";
          } ?>
        </div>
      </div>
      <div id="aceptarCancelar">
        <button type="button" class="btn-grad"><a href="../../index.php"><i class="fas fa-reply-all"></i></a></button>
      </div>  
    </article>
  </div>
  <div class="pokedexTapa2"></div>
</div>