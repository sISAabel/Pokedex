<?php
require_once "apiPokemon.php";
require_once "apiDescripcion.php";

class POKEMON
{
  public $codigo;
  public $nombre;
  public $descripcion;
  public $tipo;
  public $habilidades;
  public $atributos;
  public $imagen;
  public $peso;
  public $altura;
  public $movimiento;

  public function __construct($codigo = "", $nombre = "", $descripcion = array(), $tipo = array(), $habilidades = array(), $atributos = array(), $imagen = "", $peso = "", $altura = "", $movimiento = array())
  {
    $this->codigo = $codigo;
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->tipo = $tipo;
    $this->habilidades = $habilidades;
    $this->atributos = $atributos;
    $this->imagen = $imagen;
    $this->peso = $peso;
    $this->altura = $altura;
    $this->movimiento = $movimiento;
  }

  public function cargarPokemon($codigo)
  {
    $datos = new apiPokemon($codigo);
    $this->codigo = $datos->datos->id;

    $this->nombre = $datos->datos->name;

    $this->imagen = $datos->datos->sprites->other->{'official-artwork'}->front_default;

    $descripciones = new apiDescripcion($datos->datos->species->url);
    $this->descripcion = $descripciones->descripcion;

    $tipos = [];
    for ($i = 0; $i < count($datos->datos->types); $i++) {
      array_push($tipos, array('tipo' => $datos->datos->types[$i]->type->name));
    }
    $this->tipo = $tipos;

    $habilidad = [];
    foreach ($datos->datos->abilities as $hab) {
      array_push($habilidad, $hab->ability->name);
    }
    $this->habilidades = $habilidad;

    $this->peso = $datos->datos->weight * 0.1;

    $this->altura = $datos->datos->height * 0.1;

    $movimiento = [];
    for ($i = 0; $i < count($datos->datos->moves); $i++) {
      array_push($movimiento, array('movimiento' => $datos->datos->moves[$i]->move->name));
    }
    $this->movimiento = $movimiento;
  }
}
