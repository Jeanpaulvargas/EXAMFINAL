<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    require '../../modelos/medico.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['medi_nombres'] = htmlspecialchars( $_GET['medi_nombres']);
        $_GET['medi_apellidos'] = htmlspecialchars( $_GET['medi_apellidos']);
        $_GET['medi_especialidad'] = htmlspecialchars( $_GET['medi_especialidad']);

        $objmedico = new Medicos($_GET);
        $medicos = $objmedico->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $medicos,
            'codigo' => 1
        ];
        // var_dump($medicos);
        
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }       


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

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
    <h1 class="text-center">MEDICOS EN SERVICIO</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Primer Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Especialidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($medicos) > 0) : ?>
                        <?php foreach ($medicos as $key => $medico) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $medico['medi_nombres'] ?></td>
                                <td><?= $medico['medi_apellidos'] ?></td>
                                <td><?= $medico['medi_especialidad'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../vistas/medicos/modificar.php?medico_id=<?= base64_encode($medico['medico_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/medicos/eliminar.php?medico_id=<?= base64_encode($medico['medico_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No existen medicos registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>  