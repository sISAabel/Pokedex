<?php
class apiLista
{
  public $datos;

  function __construct($pagina)
  {
    $api = curl_init($pagina);
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    $this->datos = json_decode(curl_exec($api));
    curl_close($api);
  }
}
