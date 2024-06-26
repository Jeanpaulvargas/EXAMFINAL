<?php
    //  ini_set('display_errors', '1');
    //  ini_set('display_startup_errors', '1');
    //  error_reporting(E_ALL);

require '../../modelos/pacientes.php';

// VALIDAR INFORMACION
$_POST['paciente_id'] = filter_var($_POST['paciente_id'], FILTER_VALIDATE_INT);
$_POST['paci_nombres'] = htmlspecialchars($_POST['paci_nombres']);
$_POST['paci_apellidos'] = htmlspecialchars($_POST['paci_apellidos']);
$_POST['paci_dpi'] = htmlspecialchars($_POST['paci_dpi']);
$_POST['paci_sexo'] = htmlspecialchars($_POST['paci_sexo']);
$_POST['paci_referido'] = htmlspecialchars($_POST['paci_referido']);


if ($_POST['paci_nombres'] == '' || $_POST['paci_apellidos'] == '' ||  $_POST['paci_dpi'] == '' ||  $_POST['paci_sexo'] == '' ||  $_POST['paci_referido'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $paciente = new Pacientes($_POST);

        
        $modificar = $paciente->modificar();

        $resultado = [
            'mensaje' => 'PACIENTE MODIFICADO CORRECTAMENTE',
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
        <a href="../../controladores/pacientes/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>