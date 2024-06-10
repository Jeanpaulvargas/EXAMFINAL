<?php

    require '../../modelos/medico.php';
    
    $_GET['medico_id'] = filter_var( base64_decode($_GET['medico_id']), FILTER_SANITIZE_NUMBER_INT);
    $medico = new Medicos($_GET);
    
    try{
        
        $eliminar = $medico->eliminar();
        $resultado = [
            'mensaje' => 'MEDICO ELIMINADO CORRECTAMENTE',
            'codigo' => 1
        ];
        
    } catch (PDOException $pe){
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR ELIMINANDO EL REGISTRO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }




$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../controladores/medicos/buscar.php" class="btn btn-primary w-100">REGRESAR</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>  
