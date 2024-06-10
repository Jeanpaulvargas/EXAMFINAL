<?php
require '../../modelos/clinica.php';

// consulta
try {
    $_GET['clin_nombre'] = htmlspecialchars($_GET['clin_nombre']);
    $_GET['clin_sala'] = htmlspecialchars($_GET['clin_sala']);

    $objclinica = new Clinicas($_GET);
    $clinicas = $objclinica->buscar();
    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $clinicas,
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
        <a href="../../vistas/clinicas/index.php" class="btn btn-primary w-100">VOLVER</a>
    </div>
</div>

<h1 class="text-center">CLINICAS DEL HOSPITAL</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre de la Clínica</th>
                    <th scope="col">Médico Asignado</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado['codigo'] == 1 && count($clinicas) > 0) : ?>
                    <?php foreach ($clinicas as $key => $clinica) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $clinica['clin_nombre'] ?></td>
                            <td><?= $clinica['medi_nombres'] ?></td>
                            <td><?= $clinica['clin_sala'] ?></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="../../vistas/clinicas/modificar.php?clinica_id=<?= base64_encode($clinica['clinica_id']) ?>" class="btn btn-info me-1">
                                        <i class="bi bi-pencil-square"></i> Modificar
                                    </a>
                                    <a href="../../controladores/clinicas/eliminar.php?clinica_id=<?= base64_encode($clinica['clinica_id']) ?>" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">No existen clínicas registradas</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>
