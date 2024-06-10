<?php

include_once '../../vistas/templates/header.php'; 

require '../../modelos/medico.php';

$buscarMedico = new medicos();
$medico = $buscarMedico->buscarMedicos()
?>

<h1 class="text-center">FORMULARIO DE CREACION DE CLINICAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/clinicas/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="clin_nombre">NOMBRE DE LA CLINICA</label>
                <input type="text" name="clin_nombre" id="clin_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clin_sala">NUMERO DE SALA</label>
                <input type="text" name="clin_sala" id="clin_sala" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="clin_medico_id">MEDICO ASIGNADO</label>
                <select id="clin_medico_id" name="clin_medico_id" class="form-control">
                <option value="">SELECCIONE</option>
                    <?php foreach ($medico as $medico) : ?>
                        <option value="<?= $medico['medico_id'] ?>">
                            <?= $medico['med_especialidad'] ."" ?>
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
            <div class="col">
                <a href="../../controladores/clinicas/buscar.php" class="btn btn-primary w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>