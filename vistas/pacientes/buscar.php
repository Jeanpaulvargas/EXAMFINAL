<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO PACIENTES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/pacientes/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="paci_nombres">INGRESAR NOMBRE</label>
                <input type="text" name="paci_nombres" id="paci_nombres" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="paci_apellidos">INGRESAR APELLIDOS</label>
                <input type="text" name="paci_apellidos" id="paci_apellidos" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="paci_dpi">DPI</label>
                <input type="text" name="paci_dpi" id="paci_dpi" class="form-control" >
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-success text-white"> BUSCAR</button>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>

   