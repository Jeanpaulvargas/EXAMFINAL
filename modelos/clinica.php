<?php

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

require_once 'conexion.php';

class clinicas extends conexion
{
  public $clinica_id;
  public $clin_nombre;
  public $clin_sala;
  public $clinica_situacion;
  public $clin_medico_id;

  public function __construct($args = [])
  {
    $this->clinica_id = $args['clinica_id'] ?? null;
    $this->clin_nombre = $args['clin_nombre'] ?? '';
    $this->clin_sala = $args['clin_sala'] ?? '';
    $this->clinica_situacion = $args['clinica_situacion'] ?? '';
    $this->clin_medico_id = $args['clin_medico_id'] ?? '';

  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into clinicas (clin_nombre, clin_sala, clin_medico_id) values ('$this->clin_nombre', '$this->clin_sala', '$this->clin_medico_id')";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

//  METODO PARA CONSULTAR

 public static function buscarTodos(...$columnas)
 {
   $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
   $sql = "SELECT $cols FROM clinicas where clinica_situacion = 1 ";
   $resultado = self::servir($sql);
   return $resultado;
 }


 public function buscar(...$columnas)
 {
   $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
   $sql = "SELECT $colums FROM clinicas
   inner join medico on clin_medico_id = medico_id where clinica_situacion = 1 ";


   if ($this->clin_nombre != '') {
     $sql .= " AND clin_nombre like '%$this->clin_nombre%' ";
   }
   if ($this->clin_sala != '') {
     $sql .= " AND clin_sala like '%$this->clin_sala%' ";
   }

  
   $resultado = self::servir($sql);
   return $resultado;
 }

 public function buscarClinicas()
 {
   $sql = " SELECT * FROM clinicas where clinica_situacion = 1";
   $resultado = self::servir($sql);
   return $resultado;
 }


 public function buscarId($id)
 {
   $sql = " SELECT * FROM clinicas WHERE clinica_situacion = 1 AND clinica_id = '$id' ";
   $resultado = array_shift(self::servir($sql));

   return $resultado;
 }



 public function modificar()
  {
    $sql = "UPDATE clinicas SET clin_nombre = '$this->clin_nombre', clin_sala = '$this->clin_sala', WHERE clinica_id = $this->clinica_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  public function eliminar()
  {
 
    $sql = "UPDATE clinicas SET clinica_situacion = 0 WHERE clinica_id = $this->clinica_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }
}