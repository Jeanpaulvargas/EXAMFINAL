<?php

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

require_once 'conexion.php';

class citas extends conexion
{
  public $cita_id;
  public $cit_fecha;
  public $cit_situacion;
  public $cit_clinica_id;
  public $cit_paciente_id;



  public function __construct($args = [])
  {
    $this->cita_id = $args['cita_id'] ?? null;
    $this->cit_fecha = $args['cit_fecha'] ?? '';
    $this->cit_situacion = $args['cit_situacion'] ?? '';
    $this->cit_clinica_id = $args['cit_clinica_id'] ?? '';
    $this->cit_paciente_id = $args['cit_paciente_id'] ?? '';

  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into cita (cit_fecha, cit_clinica_id, cit_paciente_id) values ('$this->cit_fecha', '$this->cit_clinica_id', '$this->cit_paciente_id')";


    $resultado = $this->ejecutar($sql);
    
    return $resultado;
  }
}