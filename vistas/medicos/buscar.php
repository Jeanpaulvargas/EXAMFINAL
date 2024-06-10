<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">MEDICOS DEL HOSPITAL</h1>
<div class="row justify-content-center">
    <form action="../../controladores/medicos/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="medi_nombres">INGRESE  NOMBRES</label>
                <input type="text" name="medi_nombres" id="medi_nombres" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="medi_apellidos">INGRESE  APELLIDOS</label>
                <input type="text" name="medi_apellidos" id="medi_apellidos" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="medi_especialidad">INGRESE ESPECIALIDAD</label>
                <input type="text" name="medi_especialidad" id="medi_especialidad" class="form-control" >
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

   