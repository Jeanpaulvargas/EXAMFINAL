<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

include '../../vistas/templates/header.php';
require_once '../../modelos/pacientes.php';
require_once '../../modelos/clinica.php';


$buscarPaciente = new Pacientes();
$pacientes = $buscarPaciente->buscarPacientes();

$buscarClinica = new clinicas();
$clinicas = $buscarClinica->buscarClinicas();


?>

<h1 class="text-center">FORMULARIO DE CITAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/citas/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">

        <div class="row mb-3">
            <div class="col">
                <label for="cit_paciente_id">PACIENTE</label>
                <select id="cit_paciente_id" name="cit_paciente_id" class="form-control">
                    <option value="">SELECCIONE</option>
                    <?php foreach ($pacientes as $paciente) : ?>
                        <option value="<?= $paciente['paciente_id'] ?>">
                            <?= $paciente['nombres'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="cit_fecha">FECHA DE LA CITA</label>
                <input type="datetime-local" name="cit_fecha" id="cit_fecha" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="cit_clinica_id">CLINICA</label>
                <select id="cit_clinica_id" name="cit_clinica_id" class="form-control">
                    <option value="">SELECCIONE</option>
                    <?php foreach ($clinicas as $clinica) : ?>
                        <option value="<?= $clinica['clinica_id'] ?>">
                            <?= $clinica['clin_nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col">
                <a href="../../controladores/s/buscar.php" class="btn btn-primary w-100">BUSCAR</a>
            </div> -->
        </div>
    </form>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>