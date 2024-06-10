<?php



require_once 'conexion.php';

class Citas extends conexion
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

  public function setCitaFecha($fecha)
  {
    $sql = "SELECT * FROM cita where $this->cit_fecha = $fecha";
  }

  public function buscarPorFecha($fechaCita)
  {
    $sql = "SELECT clin_nombre, medi_nombres, paci_nombres, paci_dpi, cit_fecha,  paci_referido from cita
            inner join clinicas on cit_clinica_id = clinica_id 
            inner join paciente on cit_paciente_id = paciente_id 
            inner join medico on clin_medico_id = medico_id
            where cit_situacion = 1 ";

    if ($fechaCita != '') {
      $sql .= "  and cit_fecha = '$fechaCita'";
    }

    // var_dump($sql);
    // exit;

    $resultado = self::servir($sql);
    return $resultado;
  }


  public function buscar()
  {
    $sql = "SELECT * from cita where cit_situacion = 1 ";

    if ($this->cit_paciente_id != '') {
      $sql .= " and cit_paciente_id like '%$this->cit_paciente_id%' ";
    }

    if ($this->cit_paciente_id != '') {
      $sql .= " and cit_paciente_id = $this->cit_paciente_id ";
    }

    if ($this->cita_id != null) {
      $sql .= " and cita_id = $this->cita_id ";
    }

    $resultado = self::servir($sql);
    return $resultado;
  }



  public function modificar()
  {
    $sql = "UPDATE citas SET cit_paciente_id = '$this->cit_paciente_id', cit_paciente_id = $this->cit_paciente_id, cit_fecha = $this->cit_fecha, cita_hora = $this->cita_hora, cita_referencia = $this->cita_referencia where cita_id = $this->cita_id";

    $resultado = self::ejecutar($sql);
    return $resultado;
  }

  public function eliminar()
  {
    $sql = "UPDATE citas SET cit_situacion = 0 where cita_id = $this->cita_id";

    $resultado = self::ejecutar($sql);
    return $resultado;
  }

  public function busqueda()
  {


    $sql = " SELECT * FROM citas inner join pacientes on paciente_id = cit_paciente_id inner join medicos on medico_id = cit_paciente_id inner join clinicas on clinica_id = medico_clinica WHERE cit_situacion = 1  ";


    $resultado = self::servir($sql);
    return $resultado;
  }
}
