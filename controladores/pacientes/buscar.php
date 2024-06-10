<?php
require '../../modelos/pacientes.php';

// consulta
try {
    $_GET['paci_nombres'] = htmlspecialchars($_GET['paci_nombres']);
    $_GET['paci_apellidos'] = htmlspecialchars($_GET['paci_apellidos']);
    $_GET['paci_dpi'] = htmlspecialchars($_GET['paci_dpi']);

    $objpaciente = new Pacientes($_GET);
    $pacientes = $objpaciente->buscar();
    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $pacientes,
        'codigo' => 1
    ];
} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
}

$alertas = ['danger', 'success', 'warning'];

include_once '../../vistas/templates/header.php'; 
?>

<div class="row mb-4 justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/pacientes/index.php" class="btn btn-primary w-100">Volver</a>
    </div>
</div>
<h1 class="text-center"> PACIENTES</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Primer Nombre</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">DPI</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($resultado['codigo'] == 1 && count($pacientes) > 0) : ?>
                    <?php foreach ($pacientes as $key => $paciente) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1?></th>
                            <td><?= $paciente['paci_nombres'] ?></td>
                            <td><?= $paciente['paci_apellidos'] ?></td>
                            <td><?= $paciente['paci_dpi'] ?></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="../../vistas/pacientes/modificar.php?paciente_id=<?= base64_encode($paciente['paciente_id'])?>" class="btn btn-info me-1">
                                        <i class="bi bi-pencil-square"></i> Modificar
                                    </a>
                                    <a href="../../controladores/pacientes/eliminar.php?paciente_id=<?= base64_encode($paciente['paciente_id'])?>" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No existen pacientes</td>
                    </tr>  
                <?php endif ?>
            </tbody>
        </table>
    </div>        
</div>        
<?php include_once '../../vistas/templates/footer.php'; ?>
