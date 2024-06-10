<?php

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

require 'conexion.php';

class medicos extends conexion
{
  public $medico_id;
  public $medi_nombres;
  public $medi_apellidos;
  public $medi_especialidad;
  public $medico_situacion;


  public function __construct($args = [])
  {
    $this->medico_id = $args['medico_id'] ?? null;
    $this->medi_nombres = $args['medi_nombres'] ?? '';
    $this->medi_apellidos = $args['medi_apellidos'] ?? '';
    $this->medi_especialidad = $args['medi_especialidad'] ?? '';
    $this->medico_situacion = $args['medico_situacion'] ?? '';
  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into medico (medi_nombres, medi_apellidos, medi_especialidad) values ('$this->medi_nombres',  '$this->medi_apellidos', '$this->medi_especialidad')";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

//  METODO PARA CONSULTAR

 public static function buscarTodos(...$columnas)
 {
   $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
   $sql = "SELECT $cols FROM medico where medico_situacion = 1 ";
   $resultado = self::servir($sql);
   return $resultado;
 }


 public function buscar(...$columnas)
 {
   $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
   $sql = "SELECT $colums FROM medico where medico_situacion = 1 ";


   if ($this->medi_nombres != '') {
     $sql .= " AND medi_nombres like '%$this->medi_nombres%' ";
   }
   if ($this->medi_apellidos != '') {
     $sql .= " AND medi_apellidos like'%$this->medi_apellidos%' ";
   }
   if ($this->medi_especialidad != '') {
     $sql .= " AND medi_especialidad like'%$this->medi_especialidad%' ";
   }

   $resultado = self::servir($sql);
   return $resultado;
 }

 public function buscarId($id)
 {
   $sql = " SELECT * FROM medico WHERE medico_situacion = 1 AND medico_id = '$id' ";
   $resultado = array_shift(self::servir($sql));

   return $resultado;
 }

 public function buscarMedicos()
 {
   $sql = " SELECT * FROM medico ";
   $resultado = self::servir($sql);
   return $resultado;
 }

 public function modificar()
  {
    $sql = "UPDATE medico SET medi_nombres = '$this->medi_nombres', medi_apellidos = '$this->medi_apellidos', medi_especialidad = '$this->medi_especialidad' WHERE medico_id = $this->medico_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  public function eliminar()
  {
    //   $sql = "DELETE FROM medicos WHERE medico_id = $this->medico_id ";

    //  echo $sql;

    $sql = "UPDATE medico SET medico_situacion = 0 WHERE medico_id = $this->medico_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }
}