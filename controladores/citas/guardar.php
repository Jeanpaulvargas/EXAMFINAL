<?php


require '../../modelos/citas.php';

// VALIDAR INFORMACION
$_POST['cit_paciente_id'] = htmlspecialchars($_POST['cit_paciente_id']);
$_POST['cit_fecha']= date('Y-m-d H:i', strtotime($_POST['cit_fecha']));
$_POST['cit_clinica_id'] = htmlspecialchars($_POST['cit_clinica_id']);

 
if ($_POST['cit_paciente_id'] == '' || $_POST['cit_fecha'] == '' || $_POST['cit_clinica_id'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    
    ];
} else {
    // Formatear la fecha

    try {
        // REALIZAR CONSULTA
        $citas = new citas($_POST);
        $guardar = $citas->guardar();
        $resultado = [
            'mensaje' => 'CITA INSERTADA CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
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
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/citas/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>