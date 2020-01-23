<?php 
require_once 'includes/unidadesFunciones.php';
$numeroUnidades = contarRegistros("unidades");  

$elementos = new unidadesFunciones();
$unidades = $elementos->numeroElementos("MOTRIZ");
$remolques = $elementos->numeroElementos("ARRASTRE");
$dolly = $elementos->numeroElementos("DOLLY");


?>

<div class="container">
   <div class="row">
      <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Numero Total de unidades </span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $numeroUnidades; ?></span>
                    </div>
                  </div>
        </div>
      <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Numero de Tractores </span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $unidades; ?></span>
                    </div>
                  </div>
        </div>
      <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Numero de Remolques</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $remolques; ?></span>
                    </div>
                  </div>
        </div>      
      <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Numero de Dollys</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $dolly; ?></span>
                    </div>
                  </div>
        </div>    

  </div>      
</div>