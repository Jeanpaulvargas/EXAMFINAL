<?php
include_once '../../vistas/templates/header.php'; 
require '../../modelos/medico.php';

$buscarMedico = new medicos();
$medicos = $buscarMedico->buscarMedicos();
?>

<h1 class="text-center">CREAR CLÍNICA</h1>
<div class="row justify-content-center">
    <form action="../../controladores/clinicas/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="clin_nombre">Nombre de la Clínica</label>
                <input type="text" name="clin_nombre" id="clin_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clin_sala">Número de Sala</label>
                <input type="text" name="clin_sala" id="clin_sala" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clin_medico_id">Médico Asignado</label>
                <select id="clin_medico_id" name="clin_medico_id" class="form-control">
                    <option value="">SELECCIONE</option>
                    <?php foreach ($medicos as $medico) : ?>
                        <option value="<?= $medico['medico_id'] ?>">
                            <?= $medico['medi_nombres'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">Guardar</button>
            </div>
            <div class="col">
                <a href="../../controladores/clinicas/buscar.php" class="btn btn-primary w-100">Buscar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>
