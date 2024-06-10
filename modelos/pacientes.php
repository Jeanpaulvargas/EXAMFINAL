<?php

//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);

require_once 'conexion.php';

class Pacientes extends conexion
{
  public $paciente_id;
  public $paci_nombres;
  public $paci_apellidos;
  public $paci_dpi;
  public $paci_sexo;
  public $paci_referido;
  public $paciente_situacion;


  public function __construct($args = [])
  {
    $this->paciente_id = $args['paciente_id'] ?? null;
    $this->paci_nombres = $args['paci_nombres'] ?? '';
    $this->paci_apellidos = $args['paci_apellidos'] ?? '';
    $this->paci_dpi = $args['paci_dpi'] ?? '';
    $this->paci_sexo = $args['paci_sexo'] ?? '';
    $this->paci_referido = $args['paci_referido'] ?? '';
    $this->paciente_situacion = $args['paciente_situacion'] ?? '';
  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into Paciente (paci_nombres, paci_apellidos, paci_dpi, paci_sexo, paci_referido) values ('$this->paci_nombres','$this->paci_apellidos', '$this->paci_dpi', '$this->paci_sexo', '$this->paci_referido')";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  // METODO PARA CONSULTAR

  public static function buscarTodos(...$columnas)
  {
    $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
    $sql = "SELECT $cols FROM paciente where paciente_situacion = 1 ";
    $resultado = self::servir($sql);
    return $resultado;
  }


  public function buscar(...$columnas)
  {
    $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
    $sql = "SELECT $colums FROM pacientes where paciente_situacion = 1 ";


    if ($this->paci_nombres != '') {
      $sql .= " AND paci_nombres like '%$this->paci_nombres%' ";
    }
    if ($this->paci_apellidos != '') {
      $sql .= " AND paci_apellidos like'%$this->paci_apellidos%' ";
    }
    if ($this->paci_dpi != '') {
      $sql .= " AND paci_dpi like'%$this->paci_dpi%' ";
    }

    $resultado = self::servir($sql);
    return $resultado;
  }

  public function buscarId($id)
  {
    $sql = " SELECT * FROM paciente WHERE paciente_situacion = 1 AND paciente_id = '$id' ";
    $resultado = array_shift(self::servir($sql));

    return $resultado;
  }

  public function buscarPacientes()
 {
   $sql = " SELECT  TRIM(paci_nombres) ||  ' ' || TRIM(paci_apellidos) || ' ' AS nombres, paciente_id FROM paciente where paciente_situacion = 1";
  
   $resultado = self::servir($sql);
 
   
   return $resultado;
 }


  public function modificar()
  {
    $sql = "UPDATE paciente SET paci_nombres = '$this->paci_nombres', paci_apellidos = '$this->paci_apellidos', paci_dpi = '$this->paci_dpi', paci_sexo = '$this->paci_sexo', paci_referido = '$this->paci_referido' WHERE paciente_id = $this->paciente_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  public function eliminar()
  {
    //  $sql = "DELETE FROM pacientes WHERE paciente_id = $this->paciente_id ";

    // echo $sql;

    $sql = "UPDATE paciente SET paciente_situacion = 0 WHERE paciente_id = $this->paciente_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

}
