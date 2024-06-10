<?php
//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);

require_once '../../modelos/citas.php';

if (isset($_GET['cit_fecha']) && !empty($_GET['cit_fecha'])) {
    $_GET['cit_fecha'] = date("Y-m-d H:i", strtotime($_GET['cit_fecha']));
    $fechaCita = $_GET['cit_fecha'];
} else {
    $fechaCita = '';
}

try {
    $cita = new Citas();
    $citas = $cita->buscarPorFecha($fechaCita);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


$citasPorClinica = [];
if (isset($citas) && count($citas) > 0) {
    foreach ($citas as $cita) {
        $clinica = $cita['clin_nombre'] ?? 'Sin Clínica';
        if (!isset($citasPorClinica[$clinica])) {
            $citasPorClinica[$clinica] = [];
        }
        $citasPorClinica[$clinica][] = $cita;
    }
}


$fechaSolo = date("Y-m-d", strtotime($fechaCita));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Buscar citas</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

            <h2 class="mt-5">
                    <?= !empty($fechaCita) ? "Citas para el día de hoy: " . htmlspecialchars($fechaSolo) : "Citas registradas" ?>
                </h2>

                <?php if (isset($citas) && count($citas) > 0) : ?>
                    <?php foreach ($citasPorClinica as $clinica => $citas) : ?>
                        <h3 class="mt-4"><?= htmlspecialchars($clinica) ?></h3>
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>NO.</th>
                                    <th>PACIENTE</th>
                                    <th>DPI</th>
                                    <th>MÉDICO</th>
                                    <th>FECHA CITA</th>
                                    <th>REFERIDO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($citas as $key => $cita) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= htmlspecialchars($cita['paci_nombres'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($cita['paci_dpi'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($cita['medi_nombres'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($cita['cit_fecha'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($cita['paci_referido'] ?? '') ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                        NO EXISTEN REGISTROS
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-lg-4">
                <a href="../../vistas/citas/buscar.php" class="btn btn-info w-100">Regresar a la búsqueda</a>
            </div>
        </div>
    </div>
</body>
</html>
