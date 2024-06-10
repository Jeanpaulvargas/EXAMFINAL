<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE BUSQUEDA DE CLINICAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/clinicas/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="clin_nombre">NOMBRE DE LA CLINICA</label>
                <input type="text" name="clin_nombre" id="clin_nombre" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clin_sala">NUMERO DE SALA</label>
                <input type="text" name="clin_sala" id="clin_sala" class="form-control" >
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

   