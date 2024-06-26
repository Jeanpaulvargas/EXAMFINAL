<?php
    //  ini_set('display_errors', '1');
    //  ini_set('display_startup_errors', '1');
    //  error_reporting(E_ALL);

require '../../modelos/medico.php';

// VALIDAR INFORMACION
$_POST['medico_id'] = filter_var($_POST['medico_id'], FILTER_VALIDATE_INT);
$_POST['medi_nombres'] = htmlspecialchars($_POST['medi_nombres']);
$_POST['medi_apellidos'] = htmlspecialchars($_POST['medi_apellidos']);
$_POST['medi_especialidad'] = htmlspecialchars($_POST['medi_especialidad']);



if ($_POST['medi_nombres'] == '' ||  $_POST['medi_apellidos'] == '' ||    $_POST['medi_especialidad'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $medico = new Medicos($_POST);

        
        $modificar = $medico->modificar();

        $resultado = [
            'mensaje' => 'MEDICO MODIFICADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MODIFICANDO EL REGISTRO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
}


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../controladores/medicos/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>