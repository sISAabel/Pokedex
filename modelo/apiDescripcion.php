<?php
class apiDescripcion
{
  public $descripcion;

  function __construct($direccion)
  {
    $api = curl_init($direccion);
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    $descripciones = curl_exec($api);
    curl_close($api);
    $jsonDescripcion = json_decode($descripciones);

    $jsonJuegoDescripcion = [];
    for ($j = 0; $j < count($jsonDescripcion->flavor_text_entries); $j++) {
      $elemento = $jsonDescripcion->flavor_text_entries;
      if ($elemento[$j]->language->name == 'es') {
        array_push($jsonJuegoDescripcion, array(
          'juego' => "Pokemon "
            . $elemento[$j]->version->name,
          "descripcion" => $elemento[$j]->flavor_text
        ));
      }
    }
    $this->descripcion = $jsonJuegoDescripcion;
  }
}
