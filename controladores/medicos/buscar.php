<?php
require '../../modelos/medico.php';

// consulta
try {
    $_GET['medi_nombres'] = htmlspecialchars($_GET['medi_nombres']);
    $_GET['medi_apellidos'] = htmlspecialchars($_GET['medi_apellidos']);
    $_GET['medi_especialidad'] = htmlspecialchars($_GET['medi_especialidad']);

    $objmedico = new Medicos($_GET);
    $medicos = $objmedico->buscar();
    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $medicos,
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
        <a href="../../vistas/medicos/index.php" class="btn btn-primary w-100">VOLVER</a>
    </div>
</div>
<h1 class="text-center">MÉDICOS EN SERVICIO</h1>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Primer Nombre</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado['codigo'] == 1 && count($medicos) > 0) : ?>
                    <?php foreach ($medicos as $key => $medico) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1?></th>
                            <td><?= $medico['medi_nombres'] ?></td>
                            <td><?= $medico['medi_apellidos'] ?></td>
                            <td><?= $medico['medi_especialidad'] ?></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="../../vistas/medicos/modificar.php?medico_id=<?= base64_encode($medico['medico_id'])?>" class="btn btn-info me-1">
                                        <i class="bi bi-pencil-square"></i> Modificar
                                    </a>
                                    <a href="../../controladores/medicos/eliminar.php?medico_id=<?= base64_encode($medico['medico_id'])?>" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No existen médicos registrados</td>
                    </tr>  
                <?php endif ?>
            </tbody>
        </table>
    </div>        
</div>        
<?php include_once '../../vistas/templates/footer.php'; ?>
