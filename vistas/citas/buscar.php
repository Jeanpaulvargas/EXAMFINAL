<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE CITAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/citas/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre_clinica">NOMBRE DEL PACIENTE</label>
                <input type="text" name="cli_nombre_clinica" id="cli_nombre_clinica" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_ubicacion">FECHA DE LA CITA</label>
                <input type="text" name="cli_ubicacion" id="cli_ubicacion" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">CLINICA</label>
                <input type="text" name="cli_telefono" id="cli_telefono" class="form-control" >
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

   