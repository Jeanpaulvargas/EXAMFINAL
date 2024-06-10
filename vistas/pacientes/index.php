<?php

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO PARA PACIENTES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/pacientes/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="paci_nombres">INGRESE NOMBRES</label>
                <input type="text" name="paci_nombres" id="paci_nombres" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="paci_apellidos">INGRESE APELLIDO</label>
                <input type="text" name="paci_apellidos" id="paci_apellidos" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="paci_dpi">INGRESE SU DPI</label>
                <input type="text" name="paci_dpi" id="paci_dpi" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="paci_sexo">INGRESE GENERO</label>
                <select name="paci_sexo" id="paci_sexo">
                    <option>Seleccione</option>
                    <option value="Masculino">M</option>
                    <option value="Femenino">F</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="paci_referido">REFERENCIAS</label>
                <select name="paci_referido" id="paci_referido">
                    <option>Seleccione una Opcion</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/pacientes/buscar.php" class="btn btn-primary w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>