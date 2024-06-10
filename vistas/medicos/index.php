<?php

include_once '../../vistas/templates/header.php';

?>

<h1 class="text-center">FORMULARIO PARA MEDICOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/medicos/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="medi_nombres">INGRESE SUS NOMBRES</label>
                <input type="text" name="medi_nombres" id="medi_nombres" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="medi_apellidos">INGRESE SUS APELLIDOS</label>
                <input type="text" name="medi_apellidos" id="medi_apellidos" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="medi_especialidad">INGRESE SU ESPECIALIDAD</label>
                <input type="text" name="medi_especialidad" id="medi_especialidad" class="form-control" required>
            </div>
        </div>




        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/medicos/buscar.php" class="btn btn-primary w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>