<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require '../../modelos/pacientes.php';

$_GET['paciente_id'] = filter_var(base64_decode($_GET['paciente_id']), FILTER_SANITIZE_NUMBER_INT);
$paciente = new Pacientes();

$PacienteRegistrado = $paciente->buscarId($_GET['paciente_id']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICADOR DE PACIENTES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/pacientes/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="paciente_id" id="paciente_id" class="form-control" required value="<?= $PacienteRegistrado['paciente_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="paci_nombres">INGRESE NOMBRES</label>
                <input type="text" name="paci_nombres" id="paci_nombres" class="form-control" required value="<?= $PacienteRegistrado['paci_nombres'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="paci_apellidos">INGRESE APELLIDOS</label>
                <input type="text" name="paci_apellidos" id="paci_apellidos" class="form-control" required value="<?= $PacienteRegistrado['paci_apellidos'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="paci_dpi">DPI</label>
                <input type="text" name="paci_dpi" id="paci_dpi" class="form-control" required value="<?= $PacienteRegistrado['paci_dpi'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="paci_sexo">Genero</label>
                <select name="paci_sexo" id="paci_sexo">
                    <option>Seleccione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="paci_referido">Tiene referencia</label>
                <select name="paci_referido" id="paci_referido">
                    <option>Seleccione una opcion</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/pacientes/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>